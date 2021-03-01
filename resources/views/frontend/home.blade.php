<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper {
            background-image: url({{asset('oo.png')}});
        }
        .topbar{
            height: 50px;
            /* width: 100%; */
            background-color: rgba(128, 128, 128, 0.315);
        }
        .contact i{
            color: white;
        }
        .contact a{
            color: white;
        }
        nav {
            min-height: 80px;
            /* background-color: rgb(10, 94, 143); */
        }
        .btn {
            font-weight: bold;
            color: red;
        }
        h1{
            font-size: 60px;
            color: rgb(107, 25, 25);
            text-shadow:0px 0px 15px rgb(107, 25, 25);
        }
        .btn:hover {
            color: rgba(121, 33, 33, 0.89);
        }
        .free{
            height: 500px;
        }
        .footer-nav ul li{
            list-style: none;
        }
        .form-control{
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="wrapper d-block vh-100">
        <div class="topbar">
            <div class="container">
            <div class="contact float-right pr-3">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a class="gmail" href="">aakshenterprisesmbd@gmail.com</a>
                <!-- <div class="phone-number"> -->
                <i class="fa fa-phone" aria-hidden="true"></i>
                <a class="gmail" href="tel:+91-8938916781">+91-8938916781</a>
                <a class="gmail" href="tel:+91-9808916781">+91-9808916781</a>
                <!-- </div>  -->
            </div>
        </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light" style="z-index: 100;">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="btn" href="/">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn" href="aboutus">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn" href="services">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn" href="contactus">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn" href="login">LOGIN</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                              <div class="dropdown-menu" aria-labelledby="dropdownId">
                                  <a class="dropdown-item" href="#">Action 1</a>
                                  <a class="dropdown-item" href="#">Action 2</a>
                              </div>
                          </li> -->
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="text" placeholder="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form> -->
                </div>
            </nav>
        </div>
        <div class="content d-flex">
            <div class="free">

            </div>
            <div class="write m-auto text-center">
                <div class="input-group mb-3">
                <input type="text" id="order_id" class="form-control" placeholder="Order Id" aria-label="Recipient's username">
                <div class="input-group-append">
                    <button class="btn btn-secondary text-white" id="track_order" type="button">Track Order</button>
                </div>
                </div>
            </div>
        </div>
        <footer class="footer bg-danger">
            <div class="container">
              <div class="row">
                <nav class="footer-nav">
                  <ul>
                    <li>
                      <a class="text-white" href="https://www.dctsoftware.com" target="_blank">DCTSoftware.com</a>
                    </li>
                  </ul>
                </nav>
                <div class="credits ml-auto">
                  <span class="copyright">
                    ©
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, made with <i class="fa fa-heart heart"></i> by DCTSoftware.com
                  </span>
                </div>
              </div>
            </div>
          </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p id="response_text"></p>
                    <div class="form-group d-none">
                      <label for="enq-pin">Enquiry PIN</label>
                      <input type="password"
                        class="form-control form-control-sm" name="enq-pin" id="enq-pin" aria-describedby="enq-help" placeholder="">
                      <small id="enq-help" class="form-text text-muted"></small>
                    </div>
                    <a name="download-file" id="download-file" class="btn btn-primary d-none text-white" href="#" role="button">Download</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script>
        $('#track_order').click(function (e) {
            e.preventDefault();
            axios.get('{{route('order-status')}}',{
              params: {
                  order_id: $('#order_id').val(),
              },
            }).then(function(response){
                if(typeof response.data.failed !="undefined"){
                    $('#enq-pin').closest('div').addClass('d-none');
                    $('#download-file').addClass('d-none');
                    $('#response_text').text(response.data.failed);

                }else{
                    var text = "Your current order status is "+response.data.order.current_status;
                    text+=", Last updated at "+response.data.order.updated_at;
                    $('#response_text').text(text);
                    window.pin_check = response.data.order.pin;
                    window.download_url = response.data.order.admin_upload;
                    $('#enq-pin').closest('div').removeClass('d-none');
                    $('#download-file').removeClass('d-none');
                }
                $('#modelId').modal();
            })
        });
        $('#download-file').click(function (e) {
            e.preventDefault();
            if($('#enq-pin').val()==window.pin_check){
                window.location = "{{env('APP_URL')}}/storage/"+window.download_url;
            }else{
                $('#enq-help').text("Sorry your pin doesn't match.");
            }
        });
    </script>
</body>

</html>
