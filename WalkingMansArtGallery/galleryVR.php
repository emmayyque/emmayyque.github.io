<?php
    session_start();
    if($_SESSION['username'] == null) {
        $_SESSION['message'] = "Login is required !!!";
        header("location: index.php");
    }

    // Initialize variables
    $msg = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the specific button is clicked
        if (isset($_POST["showReviewBtn"])) {
            // Perform the PHP functionality
            $msg = 'Get Reviews';

            include("php/dbconn.php"); 
            $username = $_SESSION["username"];

            $sql = "SELECT * FROM reviews WHERE username='".$username."'";
            $result = $conn->query($sql);
        }

        if (isset($_POST["hideReviewBtn"])) {
            // Perform the PHP functionality
            $msg = '';

        }
    }

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    $k = 0;

    // Artworks Loading
    $artwork_loc = array();
    $username = $_SESSION["username"];
    include("php/dbconn.php");
    $sql = "SELECT * FROM art_det_us WHERE username='".$username."'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        // $i = mysqli_num_rows($result);
        $totalRows = $result->num_rows;
        $i = 1;
        while($row = $result->fetch_assoc()) {
            $artwork_loc[$i] = $row['art_loc'];
            $i++;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AR-Demo</title>
        <meta charset="UTF-8" name="description" content="ar-demo">

        <!-- Link to A-Frame -->
        <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
        <!-- <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script> -->

        <!-- Link to A-Frame Gamepad -->
        <script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.0.0/dist/aframe-extras.min.js"></script>
        <script src="https://unpkg.com/nipplejs@^0.10.1"></script>
        
        <!-- Link to Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <!-- Link to Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- CSS Link -->
        <link rel="stylesheet" href="css/vr2.css">        

    
        <!-- Link to ar.js -->
        <!-- <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script> -->
    </head>
    <body>        
        <a-scene>
                <a-assets>
                    <img id="floor" src="imgs/floor-tex-01.jpg" alt="">

                    <!-- Glass Texture -->
                    <a-mixin id="glassMaterial" material="src: url(imgs/glass.png); transparent: true;"></a-mixin>
                    <a-mixin id="roofGlassMaterial" material="color: #006A4E; opacity: 0.3;"></a-mixin>
                    <a-mixin id="cabin" material="src: url(imgs/glass.png); transparent: true;"></a-mixin>
                </a-assets>

                <!-- Cursor Events -->
                <a-entity cursor="rayOrigin: mouse"></a-entity>
                

                <!-- Sky Texture -->
                <a-sky material="src: url(imgs/sky.jpg)" radius="10000"></a-sky>

                <!-- Default lighting injected by A-Frame. -->
                <a-entity light="type: ambient; color: #BBB; intensity: 0.7"></a-entity>
                <a-entity light="type: directional; color: #FFF; intensity: 0.6" position="-0.5 100 1"></a-entity>

                <a-box id="artRoom" 
                        position="-2000 0 0"
                        width="1000"
                        height="5"
                        depth="1500"
                        material="src: url(imgs/floor_texture_01.jpg); repeat: 10 10; opacity: 1"
                        rotation="0 180 0"
                        shadow="receive: true">

                        <!-- <a-camera position="0 180 0" rotation="0 0 0" near="0.1" far="20000" look-controls wasd-controls="acceleration: 300"></a-camera> -->
                        <!-- <a-camera position="0 150 0" rotation="0 0 0" near="0.1" far="20000" look-controls wasd-controls="acceleration: 300"></a-camera> -->
                        

                    <!-- Back Wall -->
                        <a-box position="0 310 -750" width="1000" height="620" depth="5" rotation="0 0 0" mixin="glassMaterial">
                            <a-box position="250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="0 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="-250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                        </a-box>
                    <!-- Front Wall -->
                        <a-box position="0 310 750" width="1000" height="620" depth="5" rotation="0 0 0" mixin="glassMaterial">
                            <a-box position="250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="0 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="-250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                        </a-box>
                    <!-- Right Wall -->
                        <a-box id="wall" position="500 310 0" width="5" height="620" depth="1500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="1500" color="#000000"></a-box>
                        </a-box>
                        

                    <!-- Left Wall -->
                        <a-box id="wall" position="-500 310 500" width="5" height="620" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                        </a-box>
                        <!-- <a-box id="wall" position="-500 300 0" width="5" height="200" depth="500" material="src: url(imgs/wall-texture-05.jpg)"></a-box> -->
                        <a-box id="wall" position="-500 310 -500" width="5" height="620" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                        </a-box>
                        

                    <!-- Roof  -->
                    <a-box id="roof" 
                        position="0 620 0"
                        width="1000"
                        height="10"
                        depth="1500"
                        material="src: url(imgs/floor_texture_01.jpg); repeat: 10 10; shader: standard; opacity: 1"
                        shadow="receive: true">

                        

                        <!-- Lights Goes Here -->
                        <a-gltf-model id="ar_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 -600" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 -600"
                            target="#ar_lights_target1"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="ar_lights_target1" height="10" width="10" scale="1 1 1" position="505 -60 -600" rotation="180 90 0"></a-box>

                        <a-gltf-model id="ar_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 -300" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 -300"
                            target="#ar_lights_target2"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="ar_lights_target2" height="10" width="10" scale="1 1 1" position="505 -60 -300" rotation="180 90 0"></a-box>

                        <a-gltf-model id="ar_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 0" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 0"
                            target="#ar_lights_target3"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="ar_lights_target3" height="10" width="10" scale="1 1 1" position="505 -60 0" rotation="180 90 0"></a-box>

                        <a-gltf-model id="ar_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 300" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 300"
                            target="#ar_lights_target4"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="ar_lights_target4" height="10" width="10" scale="1 1 1" position="505 -60 300" rotation="180 90 0"></a-box>

                        <a-gltf-model id="ar_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 600" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 600"
                            target="#ar_lights_target5"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="ar_lights_target5" height="10" width="10" scale="1 1 1" position="505 -60 600" rotation="180 90 0"></a-box>
                    </a-box>
                        


                    <!-- Center Padestal -->
                    <a-box position="0 15 400" height="30" width="500" depth="150" material="src: url(imgs/wall-texture-05.jpg)" shadow="cast: true">
                        
                        <a-box position="0 150 0" height="300" width="400" depth="25" material="src: url(imgs/wall-texture-05.jpg)" shadow="cast: true">
                            <a-box position="0 -135 0" height="15" width="405" depth="30" color="#000000" shadow="cast: true"></a-box>
                            <!-- Art Work goes here -->
                            <!-- Front Side -->
                            <a-box id="Art-4" position="80 0 -12.5" height="200" width="130" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 -1" height="180" width="110" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-4" src="<?=$artwork_loc[4];?>" height="165" width="95" position="0 0 -4" rotation="0 180 0"></a-image>
                            </a-box>
                            <a-box id="Art-7" position="-80 0 -12.5" height="200" width="130" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 -1" height="180" width="110" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-7" src="<?=$artwork_loc[7];?>" height="165" width="95" position="0 0 -4" rotation="0 180 0"></a-image>
                            </a-box>

                            <!-- Back Side -->
                            <a-box id="Art-11" position="0 0 12.5" height="200" width="200" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 1" height="175" width="175" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-11" src="<?=$artwork_loc[11];?>" height="150" width="150" position="0 0 4" rotation="0 0 0"></a-image>
                            </a-box>
                        </a-box>
                        
                        <!-- Boundaries goes here -->
                        <a-box position="0 20 62" height="15" width="499" depth="25" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="0 20 -62" height="15" width="499" depth="25" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="-237 20 0" height="15" width="25" depth="149.5" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="237 20 0" height="15" width="25" depth="149.5" color="#FFFFFF" shadow="cast: true"></a-box>
                    </a-box>
                    
                    <a-box position="0 15 -400" height="30" width="500" depth="150" material="src: url(imgs/wall-texture-05.jpg)" shadow="cast: true">
                        <a-box position="0 150 0" height="300" width="400" depth="25" material="src: url(imgs/wall-texture-05.jpg)" shadow="cast: true">
                            <a-box position="0 -135 0" height="15" width="405" depth="30" color="#000000" shadow="cast: true"></a-box>
                            <!-- Art Work goes here -->
                            <!-- Front Side -->
                            <a-box id="Art-1" position="-120 0 12.5" height="200" width="108" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 1" height="185" width="95" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-1" src="<?=$artwork_loc[1];?>" height="175" width="85" position="0 0 4" rotation="0 0 0"></a-image>
                            </a-box>
                            <a-box id="Art-2" position="0 0 12.5" height="200" width="108" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 1" height="185" width="95" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-2" src="<?=$artwork_loc[2];?>" height="175" width="85" position="0 0 4" rotation="0 0 0"></a-image>
                            </a-box>
                            <a-box id="Art-3" position="120 0 12.5" height="200" width="108" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 1" height="185" width="95" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-3" src="<?=$artwork_loc[3];?>" height="175" width="85" position="0 0 4" rotation="0 0 0"></a-image>
                            </a-box>

                            <!-- Back Side -->
                            <a-box id="Art-15" position="0 0 -12.5" height="200" width="200" depth="5" color="#FFFFFF" shadow="cast: true">
                                <a-box position="0 0 -1" height="175" width="175" depth="5" color="#000000" shadow="cast: true"></a-box>
                                <a-image id="Art-15" src="<?=$artwork_loc[15];?>" height="150" width="150" position="0 0 -4" rotation="0 180 0"></a-image>
                            </a-box>
                            
                        </a-box>
                        
                        <!-- Boundaries goes here -->
                        <a-box position="0 20 62" height="15" width="499" depth="25" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="0 20 -62" height="15" width="499" depth="25" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="-237 20 0" height="15" width="25" depth="149.5" color="#FFFFFF" shadow="cast: true"></a-box>
                        <a-box position="237 20 0" height="15" width="25" depth="149.5" color="#FFFFFF" shadow="cast: true"></a-box>
                    </a-box>

                        
                        
                    <!-- Art Peices goes here -->
                    <a-box id="Art-10" position="487 300 -400" width="5" height="250" depth="223" rotation="0 0 0" color="#000000">
                        <a-box position="-4 0 0" width="5" height="213" depth="191" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-10" src="<?=$artwork_loc[10];?>" height="183" width="158" position="-5 0 0" rotation="0 270 0"></a-image>
                        </a-box>
                   </a-box>

                   <a-box id="Art-6" position="487 300 0" width="5" height="300" depth="195" rotation="0 0 0" color="#000000">
                        <a-box position="-4 0 0" width="5" height="276" depth="169" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-6" src="<?=$artwork_loc[6];?>" height="254" width="147" position="-5 0 0" rotation="0 270 0"></a-image>
                        </a-box>
                    </a-box>
               
                   <a-box id="Art-13" position="487 300 400" width="5" height="250" depth="223" rotation="0 0 0" color="#000000">
                        <a-box position="-4 0 0" width="5" height="213" depth="191" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-13" src="<?=$artwork_loc[13];?>" height="183" width="158" position="-5 0 0" rotation="0 270 0"></a-image>
                        </a-box>
                   </a-box>
                        
                   
                   <!-- Videos goes here -->
                   <a-gltf-model id="led" src="url(assets/mi-smart-tv.glb)" scale="170 170 170" position="-415 200 500" rotation="0 90 0"></a-gltf-model>
                   <a-video position="-466.5 325 500" src="videos/artVideo1.mp4" height="195" width="335" rotation="0 90 0" muted="true"></a-video>

                   <a-gltf-model id="led" src="url(assets/mi-smart-tv.glb)" scale="170 170 170" position="-415 200 -500" rotation="0 90 0"></a-gltf-model>
                   <a-video position="-466.5 325 -500" src="videos/artVideo2.mp4" height="195" width="335" rotation="0 90 0" muted="true"></a-video>
                   
                
                </a-box>

                <!-- Corridor 1 goes here -->
                <a-box id="corridor1" 
                        position="-1250 0 0"
                        width="500"
                        height="5"
                        depth="500"
                        material="src: url(imgs/corridor_texture_02.jpg); repeat: 1 1;"
                        shadow="receive: true">

                        <!-- <a-camera position="0 180 0" rotation="0 0 0" near="0.1" far="10000" look-controls wasd-controls="acceleration: 400"></a-camera> -->

                        <!-- Left Wall -->
                        <a-box id="wall" position="198 310 -275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <a-box id="wall" position="-198 310 -275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <!-- Window Glass goes here -->
                        <a-box position="0 300 290" width="400" height="400" depth="5" rotation="0 0 0" mixin="glassMaterial"></a-box>
                        <a-box id="wall" position="0 75 -275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)">
                            <!-- Pillow goes here -->
                            <a-gltf-model id="pillow1" src="url(assets/pillow.glb)" scale="70 70 70" position="125 87 5" rotation="65 -60 0"></a-gltf-model>
                            <a-gltf-model id="pillow2" src="url(assets/pillow1.glb)" scale="70 70 70" position="140 87 10" rotation="0 0 65"></a-gltf-model>
                        </a-box>
                        <a-box id="wall" position="0 545 -275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>

                        <!-- Right Wall -->
                        <a-box id="wall" position="198 310 275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <a-box id="wall" position="-198 310 275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <!-- Window Glass goes here -->
                        <a-box position="0 300 -290" width="400" height="400" depth="5" rotation="0 0 0" mixin="glassMaterial"></a-box>
                        <a-box id="wall" position="0 75 275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)">
                            <!-- Pillow goes here -->
                            <a-gltf-model id="pillow1" src="url(assets/pillow.glb)" scale="70 70 70" position="125 87 -5" rotation="-65 60 0"></a-gltf-model>
                            <a-gltf-model id="pillow2" src="url(assets/pillow1.glb)" scale="70 70 70" position="140 87 -10" rotation="0 0 65"></a-gltf-model>
                        </a-box>
                        <a-box id="wall" position="0 545 275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>

                        <!-- Roof -->
                        <a-box id="roof" position="0 620 0" width="500" height="12" depth="500" material="src: url(imgs/corridor_texture_02.jpg);">
                            <!-- Lights goes here -->
                            <a-light
                                type="spot"
                                position="100 -100 100"
                                target="#corr1_light1"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr1_light1" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="100 -10 100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="100 -100 -100"
                                target="#corr1_lights2"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr1_lights2" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="100 -10 -100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="-100 -100 100"
                                target="#corr1_lights3"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr1_lights3" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="-100 -10 100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="-100 -100 -100"
                                target="#corr1_lights4"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr1_lights4" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="-100 -12 -100" rotation="180 0 0"></a-gltf-model>
                        </a-box>
                </a-box>

                <!-- Hall 1 goes here -->
                <a-box id="Hall" 
                        position="0 0 0"
                        width="2000"
                        height="5"
                        depth="1500"
                        material="src: url(imgs/floor_texture_01.jpg); repeat: 10 10; shader: standard; opacity: 1"
                        shadow="receive: true">


                    <!-- For Roof View -->
                    <!-- <a-camera position="0 500 0" rotation="0 0 0" near="0.1" far="20000" look-controls wasd-controls="acceleration: 500"></a-camera> -->

                    <!-- For Person Height View -->
                    <a-camera id="camera" position="0 200 0" rotation="0 0 0" near="0.1" far="20000" look-controls wasd-controls="acceleration: 500"></a-camera>
                    

                <!-- Back Wall -->
                    <a-box id="wall" position="0 300 -750" width="2000" height="600" depth="5" color="#163832">
                        <a-box id="wall" position="0 -298 0" width="2000" height="5" depth="9" color="#000000"></a-box>
                    </a-box>

                <!-- Front Wall -->
                    <a-box id="wall" position="0 300 750" width="2000" height="600" depth="5" material="src: url(imgs/wall-texture-05.jpg)">
                        <a-box id="wall" position="0 -298 0" width="2000" height="5" depth="9" color="#000000"></a-box>
                    </a-box>

                <!-- Right Wall -->
                    <a-box id="wall" position="1000 400 500" width="5" height="800" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                        <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                    </a-box>
                    <a-box id="wall" position="1000 400 -500" width="5" height="800" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                        <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                    </a-box>

                <!-- Left Wall -->
                    <a-box id="wall" position="-1000 400 500" width="5" height="800" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                        <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                    </a-box>
                    <a-box id="wall" position="-1000 400 -500" width="5" height="800" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                        <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                    </a-box>
                    

                <!-- Roof  -->
                <a-cylinder
                    color="#FFFFFF"
                    height="1400"
                    radius="80"
                    segments-radial="6"
                    rotation="0 0 90"
                    position="0 810 0">
                </a-cylinder>


                <!-- Outer Roof -->
                <a-entity id="roof">
                    <a-box position="0 640 -675" width="2000" height="100" depth="150" color="#FFFFFF" rotation="-20 0 0"></a-box>
                    <a-box position="0 640 675" width="2000" height="100" depth="150" color="#FFFFFF" rotation="20 0 0"></a-box>
                    <a-box position="925 667 0" width="150" height="100" depth="1500" color="#FFFFFF"></a-box>
                    <a-box position="-925 667 0" width="150" height="100" depth="1500" color="#FFFFFF"></a-box>
                    
                    <!-- Inner Roof -->
                    <a-box position="0 720 -450" width="1450" height="100" depth="150" color="#FFFFFF" rotation="-20 0 0"></a-box>
                    <a-box position="0 720 450" width="1450" height="100" depth="150" color="#FFFFFF" rotation="20 0 0"></a-box>
                    <a-box position="650 748 0" width="150" height="100" depth="900" color="#FFFFFF"></a-box>
                    <a-box position="-650 748 0" width="150" height="100" depth="900" color="#FFFFFF"></a-box>

                    <!-- Roof Pillars -->
                    <!-- Left Side -->
                    <a-box position="-480 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="-320 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="-160 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="0 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="160 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="320 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>
                    <a-box position="480 750 350" width="80" height="50" depth="750" color="#B2BEB5" rotation="15 0 0"></a-box>

                    <!-- Right Side -->
                    <a-box position="-480 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="-320 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="-160 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="0 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="160 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="320 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>
                    <a-box position="480 750 -350" width="80" height="50" depth="750" color="#B2BEB5" rotation="-15 0 0"></a-box>

                    <!-- Roof Glass -->
                    <a-box position="0 790 180" width="1450" height="450" depth="0.2" rotation="-75 0 0" mixin="roofGlassMaterial"></a-box>
                    <a-box position="0 790 -180" width="1450" height="450" depth="0.2" rotation="75 0 0" mixin="roofGlassMaterial"></a-box>
                    <a-box position="0 680 -610" width="1900" height="200" depth="0.2" rotation="75 0 0" mixin="roofGlassMaterial"></a-box>
                    <a-box position="0 680 610" width="1900" height="200" depth="0.2" rotation="-75 0 0" mixin="roofGlassMaterial"></a-box>

                    <a-box position="800 710 0" width="200" height="1400" depth="0.2" rotation="90 0 0" mixin="roofGlassMaterial"></a-box>
                    <a-box position="-800 710 0" width="200" height="1400" depth="0.2" rotation="90 0 0" mixin="roofGlassMaterial"></a-box>
                </a-entity>
                    
                    
                <!-- Side Pillars goes here -->
                    <!-- Left -->
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="-600 360 430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="-300 360 430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="0 360 430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="300 360 430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="600 360 430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                        
                    <!-- Right -->
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="-600 360 -430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="-300 360 -430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="0 360 -430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="300 360 -430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>
                    <a-cylinder
                            color="#FFFFFF"
                            height="720"
                            radius="30"
                            rotation="0 0 0"
                            position="600 360 -430"
                            material="src: url(imgs/pillar_texture_01.jpg); repeat: 2 15;">
                            <a-cylinder
                                color="#021914"
                                height="40"
                                radius="50"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -350 0"
                            ></a-cylinder>
                            <a-cylinder
                                color="#19423A"
                                height="20"
                                radius="40"
                                segments-radial="6"
                                rotation="0 0 0"
                                position="0 -330 0"
                            ></a-cylinder>
                    </a-cylinder>

                <!-- Padestals -->
                    <!-- Right Padestal -->
                    <a-box id="padestal" position="500 100 0" width="100" height="200" depth="100" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true">
                        <a-box id="padestal" position="0 -85 0" width="120" height="30" depth="120" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 -92.5 0" width="140" height="15" depth="140" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 85 0" width="120" height="30" depth="120" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 92.5 0" width="140" height="15" depth="140" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-gltf-model src="url(assets/sculptures/sculpture1.glb)" scale="170 170 170" position="0 100 0" rotation="0 0 0"></a-gltf-model>
                    </a-box>

                    <!-- Left Padestal -->
                    <a-box id="padestal" position="-500 100 0" width="100" height="200" depth="100" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true">
                        <a-box id="padestal" position="0 -85 0" width="120" height="30" depth="120" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 -92.5 0" width="140" height="15" depth="140" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 85 0" width="120" height="30" depth="120" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-box id="padestal" position="0 92.5 0" width="140" height="15" depth="140" material="src: url(imgs/wall-texture-01.jpg)" shadow="cast: true"></a-box>
                        <a-gltf-model src="url(assets/sculptures/sculpture1.glb)" scale="170 170 170" position="0 100 0" rotation="0 0 0"></a-gltf-model>
                    </a-box>
            
                <!-- Wall Clock goes here -->
                    <a-gltf-model id="clock" src="url(assets/wallDecor/wallClock.glb)" scale="400 400 400" position="1000 400 400" rotation="90 0 90"></a-gltf-model>


                <!-- Lights Goes Here -->
                <a-light
                    type="spot"
                    position="0 600 0"
                    target="#clock"
                    angle="20"
                    penumbra="1"
                    intensity="0.6">
                </a-light>

                    <!-- Art Pieces -->
                    <!-- Art 1 goes here -->
                    <!-- Right Side -->
                    <a-box position="-700 300 -746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                        <a-box position="0 0 3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-18" src="<?=$artwork_loc[18];?>"  width="444" height="271" position="0 0 4" rotation="0 0 0"></a-image>
                        </a-box>
                   </a-box> 

                   <!-- <a-gltf-model id="art1" src="url(assets/wallDecor/modernWallFrame.glb)" scale="150 150 150" position="0 300 -700" rotation="90 0 0"></a-gltf-model> -->
                    <a-box position="0 300 -746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                        <a-box position="0 0 3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-19" src="<?=$artwork_loc[19];?>" width="444" height="271"  position="0 0 4" rotation="0 0 0"></a-image>
                        </a-box>
                    </a-box>            

                   <a-box position="700 300 -746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                        <a-box position="0 0 3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-20" src="<?=$artwork_loc[20];?>" width="444" height="271" position="0 0 4" rotation="0 0 0"></a-image>
                        </a-box>
                   </a-box> 

                   <!-- Left Side -->
                    <a-box position="-700 300 746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                    <a-box position="0 0 -3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                        <a-image id="Art-21" src="<?=$artwork_loc[21];?>" width="444" height="271" position="0 0 -4" rotation="0 0 0"></a-image>
                    </a-box>
                    </a-box> 

                    <a-box position="0 300 746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                        <a-box position="0 0 -3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-22" src="<?=$artwork_loc[22];?>" width="444" height="271" position="0 0 -4" rotation="0 0 0"></a-image>
                        </a-box>
                    </a-box>            

                    <a-box position="700 300 746" width="527" height="350" depth="5" rotation="0 0 0" color="#000000">
                        <a-box position="0 0 -3" width="478.6" height="303" depth="5" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="Art-23" src="<?=$artwork_loc[23];?>" width="444" height="271" position="0 0 -4" rotation="0 0 0"></a-image>
                        </a-box>
                    </a-box> 
                </a-box>


                <a-text value="World Famous" position="996 300 -450" scale="100 100 100" rotation="0 -90 0" style="font-size: 4.0; font-weight: bold;"></a-text>
                <a-text value="LandMarks Here" position="996 275 -450" scale="100 100 100" rotation="0 -90 0" style="font-size: 4.0; font-weight: bold;"></a-text>

                <!-- Corridor 2 Goes here -->
                <a-box id="corridor2" 
                        position="1250 0 0"
                        width="500"
                        height="5"
                        depth="500"
                        material="src: url(imgs/corridor_texture_02.jpg); repeat: 1 1;"
                        shadow="receive: true">



                        <!-- Left Wall -->
                        <a-box id="wall" position="198 310 -275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <a-box id="wall" position="-198 310 -275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <!-- Window Glass goes here -->
                        <a-box position="0 300 290" width="400" height="400" depth="5" rotation="0 0 0" mixin="glassMaterial"></a-box>
                        <a-box id="wall" position="0 75 -275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)">
                            <!-- Pillow goes here -->
                            <a-gltf-model id="pillow1" src="url(assets/pillow.glb)" scale="70 70 70" position="125 87 5" rotation="65 -60 0"></a-gltf-model>
                            <a-gltf-model id="pillow2" src="url(assets/pillow1.glb)" scale="70 70 70" position="140 87 10" rotation="0 0 65"></a-gltf-model>
                        </a-box>
                        <a-box id="wall" position="0 545 -275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>

                        <!-- Right Wall -->
                        <a-box id="wall" position="198 310 275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <a-box id="wall" position="-198 310 275" width="100" height="620" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>
                        <!-- Window Glass goes here -->
                        <a-box position="0 300 -290" width="400" height="400" depth="5" rotation="0 0 0" mixin="glassMaterial"></a-box>
                        <a-box id="wall" position="0 75 275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)">
                            <!-- Pillow goes here -->
                            <a-gltf-model id="pillow1" src="url(assets/pillow.glb)" scale="70 70 70" position="125 87 -5" rotation="-65 60 0"></a-gltf-model>
                            <a-gltf-model id="pillow2" src="url(assets/pillow1.glb)" scale="70 70 70" position="140 87 -10" rotation="0 0 65"></a-gltf-model>
                        </a-box>
                        <a-box id="wall" position="0 545 275" width="298" height="150" depth="49" material="src: url(imgs/corridor_texture_02.jpg)"></a-box>

                        <!-- Roof -->
                        <a-box id="roof" position="0 620 0" width="500" height="12" depth="500" material="src: url(imgs/corridor_texture_02.jpg);">
                            <a-light
                                type="spot"
                                position="100 -100 100"
                                target="#corr2_lights1"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr2_lights1" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="100 -10 100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="100 -100 -100"
                                target="#corr2_lights2"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr2_lights2" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="100 -10 -100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="-100 -100 100"
                                target="#corr2_lights3"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr2_lights3" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="-100 -10 100" rotation="180 0 0"></a-gltf-model>

                            <a-light
                                type="spot"
                                position="-100 -100 -100"
                                target="#corr2_lights4"
                                angle="80"
                                penumbra="1"
                                intensity="0.6"
                            ></a-light>
                            <a-gltf-model id="corr2_lights4" src="url(assets/lights/ceilingLights1.glb)" scale="50 50 50" position="-100 -12 -100" rotation="180 0 0"></a-gltf-model>
                        </a-box>
                </a-box>

                <!-- LandMarks Room -->
                <a-box id="lmRoom" 
                        position="2000 0 0"
                        width="1000"
                        height="5"
                        depth="1500"
                        material="src: url(imgs/floor_texture_01.jpg); repeat: 10 10; shader: standard; opacity: 1"
                        shadow="receive: true">

                    <!-- <a-camera position="0 180 0" rotation="0 0 0" near="0.1" far="20000" look-controls wasd-controls="acceleration: 300"></a-camera> -->

                    <!-- Back Wall -->
                        <a-box position="0 310 -750" width="1000" height="620" depth="5" rotation="0 0 0" mixin="glassMaterial">
                            <a-box position="250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="0 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="-250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                        </a-box>
                    <!-- Front Wall -->
                        <a-box position="0 310 750" width="1000" height="620" depth="5" rotation="0 0 0" mixin="glassMaterial">
                            <a-box position="250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="0 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                            <a-box position="-250 0 0" width="7" height="620" depth="7" color="#000000"></a-box>
                        </a-box>
                    <!-- Right Wall -->
                        <a-box id="wall" position="500 310 0" width="5" height="620" depth="1500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="1500" color="#000000"></a-box>
                        </a-box>
                        

                    <!-- Left Wall -->
                        <a-box id="wall" position="-500 310 500" width="5" height="620" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                        </a-box>
                        <!-- <a-box id="wall" position="-500 300 0" width="5" height="200" depth="500" material="src: url(imgs/wall-texture-05.jpg)"></a-box> -->
                        <a-box id="wall" position="-500 310 -500" width="5" height="620" depth="500" material="src: url(imgs/wall-texture-05.jpg)">
                            <a-box id="wall" position="0 -398 0" width="9" height="5" depth="505" color="#000000"></a-box>
                        </a-box>
                        

                    <!-- Roof  -->
                    <a-box id="roof" 
                        position="0 620 0"
                        width="1000"
                        height="10"
                        depth="1500"
                        material="src: url(imgs/floor_texture_01.jpg); repeat: 10 10; shader: standard; opacity: 1"
                        shadow="receive: true">

                        <!-- Lights Goes Here -->
                        <a-gltf-model id="wfl_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 -600" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 -600"
                            target="#wfl_lights_target1"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="wfl_lights_target1" height="10" width="10" scale="1 1 1" position="500 -60 -600" rotation="180 90 0"></a-box>

                        <a-gltf-model id="wfl_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 -300" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 -300"
                            target="#wfl_lights_target2"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="wfl_lights_target2" height="10" width="10" scale="1 1 1" position="500 -60 -300" rotation="180 90 0"></a-box>

                        <a-gltf-model id="wfl_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 0" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 0"
                            target="#wfl_lights_target3"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="wfl_lights_target3" height="10" width="10" scale="1 1 1" position="500 -60 0" rotation="180 90 0"></a-box>

                        <a-gltf-model id="wfl_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 300" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 300"
                            target="#wfl_lights_target4"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="wfl_lights_target4" height="10" width="10" scale="1 1 1" position="500 -60 300" rotation="180 90 0"></a-box>

                        <a-gltf-model id="wfl_lights" src="url(assets/lights/ceilingLights2.glb)" scale="50 50 50" position="450 -12 600" rotation="180 90 0"></a-gltf-model>
                        <a-light
                            type="spot"
                            position="450 -12 600"
                            target="#wfl_lights_target5"
                            angle="60"
                            penumbra="1"
                            intensity="0.6"
                        ></a-light>
                        <a-box id="wfl_lights_target5" height="10" width="10" scale="1 1 1" position="500 -60 600" rotation="180 90 0"></a-box>
                    </a-box>

                    <!-- Center Padestal -->
                    <a-box class="glassBoxOuter" position="0 50 -350" height="100" width="500" depth="150" material="src: url(imgs/wall-texture-05.jpg)" shadow="cast: true">
                        <a-box class="glassBox" position="0 50 0" scale="9.96 2.96 3" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial">
                            <!-- z x y -->
                            <!-- Top Side -->
                            <a-box position="0 0 -50" width="50" height="50" depth="0.2" rotation="0 0 0" mixin="glassMaterial"></a-box>
                            <!-- Left Side -->
                            <a-box position="25 0 -25" width="50" height="50" depth="0.2" rotation="0 90 0" mixin="glassMaterial"></a-box>
                            <!-- Right Side -->
                            <a-box position="-25 0 -25" width="50" height="50" depth="0.2" rotation="0 90 0" mixin="glassMaterial"></a-box>
                            <!-- Back Side -->
                            <a-box position="0 -25 -25" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial"></a-box>
                            <!-- Front Side -->
                            <a-box position="0 25 -25" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial"></a-box>                           
                        </a-box>
                        <!-- Label for Padestal -->
                        <a-cylinder
                            color="#FFFFFF"
                            height="300"
                            radius="40"
                            segments-radial="3"
                            rotation="0 0 90"
                            position="0 15 95"> 

                            <!-- position = y x z -->
                            <a-text value="Colosseum Rome Italy" position="25 100 0" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Eiffel Tower" position="18 100 10" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Minar-E-Pakistan" position="25 -20 0" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Statue of Liberty" position="18 -20 10" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <!-- <a-text value="Burj Khalifa" position="11.7 -20 20" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text> -->
                            <!-- <a-text value="Statue of Liberty" position="11.7 100 20" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text> -->
                        </a-cylinder>
                        
                        <a-box position="0 51 0" height="2" width="500" depth="150" color="#FFFFFF" shadow="cast: true"></a-box>
                        <!-- Object Inside -->                    
                        <a-gltf-model class="models" id="colosseum_rome_italy" src="url(assets/wfl/colosseum_rome_italy.glb)" scale="1 1 1" position="-170 80 0" rotation="0 90 0"></a-gltf-model>
                        <a-gltf-model class="models" id="colosseum_rome_italy" src="url(assets/wfl/colosseum_rome_italy.glb)" scale="1 1 1" position="-170 80 0" rotation="0 90 0"></a-gltf-model>
                        <a-gltf-model class="models" id="eiffel_tower" src="url(assets/wfl/eiffel_tower.glb)" scale="7 7 7" position="-70 52 0" rotation="0 0 0"></a-gltf-model>
                        <a-gltf-model class="models" id="minar-e-pakistan" src="url(assets/wfl/minar-e-pakistan.glb)" scale="125 125 125" position="80 52 -10" rotation="0 0 0"></a-gltf-model>
                        <a-gltf-model class="models" id="statue_of_liberty" src="url(assets/wfl/statue_of_liberty.glb)" scale="3 3 3" position="170 -56 0" rotation="0 -90 0"></a-gltf-model>
                        
                    </a-box>

                    <a-box position="0 50 350" height="100" width="500" depth="150" material="src: url(imgs/wall-texture-05.jpg)" rotation="0 180 0" shadow="cast: true">
                        <a-box position="0 50 0" scale="9.96 2.96 3" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial">
                            <!-- z x y -->
                            <!-- Top Side -->
                            <a-box position="0 0 -50" width="50" height="50" depth="0.2" rotation="0 0 0" mixin="glassMaterial"></a-box>
                            <!-- Left Side -->
                            <a-box position="25 0 -25" width="50" height="50" depth="0.2" rotation="0 90 0" mixin="glassMaterial"></a-box>
                            <!-- Right Side -->
                            <a-box position="-25 0 -25" width="50" height="50" depth="0.2" rotation="0 90 0" mixin="glassMaterial"></a-box>
                            <!-- Back Side -->
                            <a-box position="0 -25 -25" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial"></a-box>
                            <!-- Front Side -->
                            <a-box position="0 25 -25" width="50" height="50" depth="0.2" rotation="90 0 0" mixin="glassMaterial"></a-box>                           
                        </a-box>
                        <!-- Label for Padestal -->
                        <a-cylinder
                            color="#FFFFFF"
                            height="300"
                            radius="40"
                            segments-radial="3"
                            rotation="0 0 90"
                            position="0 15 95"> 

                            <!-- position = y x z -->
                            <a-text value="Sydney Opera House" position="25 100 0" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Pisa Tower" position="18 100 10" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Taj Mahal" position="25 -20 0" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <a-text value="Notre Dame De Paris" position="18 -20 10" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text>
                            <!-- <a-text value="Taj Mahal" position="11.7 100 20" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text> -->
                            <!-- <a-text value="Tokyo Tower" position="11.7 -20 20" color="#000000" rotation="0 60 -90" scale="40 40 40"></a-text> -->
                        </a-cylinder>
                        
                        <a-box position="0 51 0" height="2" width="500" depth="150" color="#FFFFFF" shadow="cast: true"></a-box>
                        <!-- Object Inside -->
                        <a-gltf-model id="sydney_opera_house" src="url(assets/wfl/sydney_opera_house.glb)" scale="3.5 3.5 3.5" position="-180 54 20" rotation="0 90 0"></a-gltf-model>
                        <a-gltf-model id="pisas_tower" src="url(assets/wfl/pisas_tower.glb)" scale="50 50 50" position="-70 50 0" rotation="0 90 0"></a-gltf-model>
                        <a-gltf-model id="taj_mahal" src="url(assets/wfl/taj_mahal.glb)" scale="0.15 0.15 0.15" position="50 50 0" rotation="0 -90 0"></a-gltf-model>
                        <a-gltf-model id="notre_dame_de_paris" src="url(assets/wfl/notre_dame_de_paris.glb)" scale="0.02 0.02 0.02" position="180 52 0" rotation="0 25 0"></a-gltf-model>
                    </a-box>
                    
                    
                   <!-- Art Peices goes here -->
                   <a-box position="487 300 300" width="5" height="300" depth="400" rotation="0 0 0" color="#000000">
                        <a-box position="-4 0 0" width="5" height="280" depth="380" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="LandMark-1" src="imgs/Landmark/lm1.jpg" height="250" width="360" position="-5 0 0" rotation="0 270 0"></a-image>
                        </a-box>
                   </a-box>

                   <a-box position="487 300 -300" width="5" height="300" depth="400" rotation="0 0 0" color="#000000">
                        <a-box position="-3 0 0" width="5" height="280" depth="380" rotation="0 0 0" color="#FFFFFF">
                            <a-image id="LandMark-2" src="imgs/Landmark/lm2.jpg" height="250" width="360" position="-5 0 0" rotation="0 270 0"></a-image>
                        </a-box>
                   </a-box>
                        
                   
                   <!-- Videos goes here -->
                   <a-gltf-model id="led" src="url(assets/mi-smart-tv.glb)" scale="170 170 170" position="-415 200 500" rotation="0 90 0"></a-gltf-model>
                   <!-- <a-video position="-466.5 325 500" src="videos/faisalMosque.mp4" height="195" width="335" rotation="0 90 0" muted="true"></a-video> -->

                   <a-gltf-model id="led" src="url(assets/mi-smart-tv.glb)" scale="170 170 170" position="-415 200 -500" rotation="0 90 0"></a-gltf-model>
                   <!-- <a-video position="-466.5 325 -500" src="videos/landmarksComposition.mp4" height="195" width="335" rotation="0 90 0" muted="true"></a-video> -->
                   
                </a-box>

                <!-- Ground goes here -->
                <a-plane id="plane"
                            height="10000"
                            width="10000"
                            position="0 -5 0"
                            rotation="-90 0 0"
                            src="imgs/ground.jpg"
                            repeat="15 15">
                </a-plane>
        </a-scene>

        <section id="nav-menu">
            <div>
                <h1>Navigation Menu</h1>
            </div>
            <div id="btn-panel">
                <button id="btn-lmRm">LandMark Room</button>
                <button id="btn-mnHl">Main Hall</button>
                <button id="btn-arRm">Art Room</button>
            </div>
        </section>

        
        <section id="profile">
            <div id="welcome-msg">
                <h1>Welcome: <?php echo $_SESSION['username']; ?></h1>
                <span><button><a href="php/logout.php" id="">Logout</a></button></span>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="showReviewForm">
                    <!-- Your form elements go here -->

                    <!-- Button to trigger PHP functionality -->
                    <button type="submit" name="showReviewBtn">Show My Reviews</button>
                    <button type="submit" name="hideReviewBtn">Hide My Reviews</button>
                </form>
                <div id="myReviews">
                    <?php
                        if ($msg == 'Get Reviews') {
                            if ($result->num_rows == 0) {
                                echo "<p>No reviews exists yet !!</p>";
                            } else {
                                echo "<table>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Review ID</th>";
                                        echo "<th>Art Number</th>";
                                        echo "<th>Review</th>";
                                        echo "<th>Rating</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($rows = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $rows['review_id'] . "</td>";
                                        echo "<td>" . $rows['art_no'] . "</td>";
                                        echo "<td>" . $rows['review'] . "</td>";
                                        echo "<td>" . $rows['rating'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                echo "</tbody>";
                                echo "</table>";
                            }
                        }
                    ?>
                </div>    
            </div>
        </section>

        <p id="artIDShow"><p>
        
        <section id="menu">
            <h1>Art Menu</h1>
            <div id="menu-btn">
                <button id="changeBtn">Change ArtWork</button>
                <button id="reviewBtn">Review ArtWork</button>
            </div>
            <div class="container">
                <h2>Others Reviews</h2>
                <p id="artID">
                    <?php $artId = "Art-21"?>
                </p>
                <div id="othRev">
                    <?php
                        echo $k;
                        $cookie = $_COOKIE['artId'.$k];
                        $k++;
                        echo $cookie;
                        $artId = $cookie;
                        $sql = "SELECT * FROM reviews WHERE art_no='$cookie'";
                        $result = $conn->query($sql);
                        
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                                <div id="singleRev">  
                                    <div class="row">
                                        <img src="imgs/profileIco.jpg" alt="profile-icon">
                                        <div>
                                            <h4><?=$row['username'];?></h4>
                                            <?php
                                                $rating = (int) $row['rating'];
                                                for ($i=1; $i<=$rating; $i++) { ?>
                                                    <i class="fa fa-star"></i>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <p><?=$row['review'];?></p>
                                </div>
                            <?php }
                        }
                    ?>
                </div>
            </div>
        </section>

        <section id="review-tab">
            <i class="fa fa-close" id="close-btn"></i>
            <div>
                <h1>Review & Rating</h1>
                <span>Item Name:&nbsp;<h2 id="item-name"></h2></span>
            </div>

            <form action="php/review.php" method="POST" id="reviewForm">
                <label for="rating">Rating:</label>
                <input type="range" name="rating" id="rating" min="0" max="5" value="0" step="1">
                <textarea name="review" id="review" cols="50" rows="10" placeholder="Write a short review !!"></textarea>
                <input type="hidden" value="artNumField" id="artNumField" name="artNumField">
                <input type="submit" name="submit" id="submit-btn">
            </form>
        </section>

        <section id="changeArtTab">
            <i class="fa fa-close" id="close-btn1"></i>
            <!-- <div>
                <span>Item Name:&nbsp;<h2 id="item-name1"></h2></span>
            </div> -->

            <form action="php/changeArt.php" method="POST" id="changeArtForm" enctype="multipart/form-data">
                <h1>Replace the Artwork</h1>
                <label for="artwork">Upload Image</label>
                <input type="file" name="artwork" id="artwork">
                <input type="hidden" value="artNumField1" id="artNumField1" name="artNumField1">
                <input type="submit" name="submit" id="submit-btn">
            </form>
        </section>
        <!-- <div id="joystick-container">           
            <div class="row"><button id="joystick-up"><i class="fa fa-arrow-up"></i></button></div>
            <div class="row">
                <button id="joystick-left"><i class="fa fa-arrow-left"></i></button>
                <button id="joystick-down"><i class="fa fa-arrow-down"></i></button>
                <button id="joystick-right"><i class="fa fa-arrow-right"></i></button>
            </div>
        </div> -->
        <script src="js/func.js"></script>
        <script src="js/app4.js"></script>
        <script src="js/camera.js"></script>
    </body>
</html>