<!DOCTYPE html>
<html>
    <head>
        <title>A simple Bootstrap modal example</title>
        <!-- jQuery core for this template -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Bootstrap Modal demo</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Click here to see Modal window
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Header message in the Modal!</h4>
                        </div>
                        <div class="modal-body">
                            The body of the modal, where you can show a message in single or multi-line. Even include a video. <br />
                            For example, embed a youtube video! OR <br />
                            Add some picture.


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">I got it! Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </body>

        </html>

