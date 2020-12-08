<?php
/* Authors: Kailey Hart, Tatiana Perry, Lauren Fasig
 * Date: 12-08-2020
 * Name: index_view.class.php
 * Description: Parent class for all view classes
 * */

class IndexView
{
    public function display($vacations)
    {
        //display the page header
        require_once 'includes/header.php';
        require_once 'includes/database.php';
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <!-- Code for the size of the web page -->
            <meta name="viewport" content="width=device-width">
            <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
            <title>Home</title>
            <script>
                //create the JavaScript variable for the base url
                let base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <!-- Main Content Area -->
        <section id="maincontent">
            <div class="container">
                <h1>Explore a new world <br> with VrGo</h1>
                <!-- Replace this code with some meaningful text about the travel agency -->
                <p>When you're ready to getaway, we're ready to inspire you.</p>
            </div>

            <div class="container">

                <!-- Section for  Top Pick bottom boxes -->
                <section id="boxes">

                    <div class="top-picks">
                        <!-- Adventure Top Pick box -->
                        <div class="box" >
                            <div class="resize-adventure"  style="border: 2px solid #3B506B"></div>
                            <h3>Adventure</h3>
                        </div>

                        <!-- Family Top Pick box -->
                        <div class="box" >
                            <div  class="resize-family" style="border: 2px solid #3B506B"></div>
                            <h3>Family</h3>
                        </div>

                        <!-- Romantic Top Pick box -->
                        <div class="box">
                            <div  class="resize-romantic"  style="border: 2px solid #3B506B"> </div>
                            <h3>Romantic</h3>
                        </div>

                        <!-- Relaxation Top Pick box -->
                        <div class="box" >
                            <div  class="resize-friends" style="border: 2px solid #3B506B"> </div>
                            <h3>Friends</h3>
                        </div>
                    </div>

                </section>


        <?php
    }//end of display function

    //this method displays the page footer
    public static function displayFooter()
    {
         require_once 'includes/footer.php';
        ?>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
