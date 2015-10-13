<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RESPONSE</title>

        <style>
            div.container {
                margin: auto;

            }
            div.row {
                display: block;
                margin-top: 10px;
            }
            div.label {
                display: inline-block;
                text-align: right;
                padding-right: 5px;
            }
            div.control {
                display: inline-block;
                vertical-align: top;
            }

        </style>

    </head>
    <body>
        
            <div class="container">
                <div class="row">
                    <h3>Thanks for Your Submission</h3>
                </div>

                <!-- Username -->
                <div class="row">
                    <div class ="label">
                        <label>Username</label>
                    </div>
                    <div class="control">
                        <?php echo $formdata['username'] ?> 
                    </div>
                </div>

                <!-- Password -->
                <div class="row">
                    <div class="label">
                        <label>Password</label>
                        <div class="control">
                            <?php echo $formdata['password'] ?>
                        </div>
                    </div>
                </div>

                <!-- Radio Buttons -->
                <div class="row">
                    <div class="label">
                        <label>Gaming Platform</label>
                        <div class="control">
                            <?php echo $formdata['gplatform'] ?>
                        </div>
                    </div>
                </div>

                <!-- Array -->
                <div class="row">
                    <div class="label">
                        <label>Favourite Titles</label>
                    </div>
                    <div class="control">
                        <?php echo $formdata['games']; ?>
                    </div>

                </div>
            </div>

        </div>



    
</body>
</html>