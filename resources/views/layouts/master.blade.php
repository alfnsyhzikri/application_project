<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            body{
              max-width: 100%;
              overflow-y: scroll;
              overflow-x: hidden;
              height: 2000px;
            }

            * {box-sizing: border-box}
            body {font-family: Verdana, sans-serif; margin:0}
            .mySlides {display: none}
            img {vertical-align: middle;}
                
            /* Slideshow container */
            .slideshow-container {
              position: relative;
              margin: auto;
            }
            
            /* Next & previous buttons */
            .prev, .next {
              cursor: pointer;
              position: absolute;
              top: 50%;
              width: auto;
              padding: 16px;
              margin-top: -22px;
              color: white;
              font-weight: bold;
              font-size: 18px;
              transition: 0.6s ease;
              border-radius: 0 3px 3px 0;
              user-select: none;
            }
            
            /* Position the "next button" to the right */
            .next {
              right: 0;
              border-radius: 3px 0 0 3px;
            }
            
            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
              background-color: rgba(0,0,0,0.8);
            }
            
            /* Caption text */
            .text {
              color: #f2f2f2;
              font-size: 15px;
              padding: 8px 12px;
              position: absolute;
              bottom: 8px;
              width: 100%;
              text-align: center;
            }
            
            /* Number text (1/3 etc) */
            .numbertext {
              color: #f2f2f2;
              font-size: 12px;
              padding: 8px 12px;
              position: absolute;
              top: 0;
            }
            
            /* The dots/bullets/indicators */
            .dot {
              cursor: pointer;
              height: 15px;
              width: 15px;
              margin: 0 2px;
              background-color: #bbb;
              border-radius: 50%;
              display: inline-block;
              transition: background-color 0.6s ease;
            }
            
            .active, .dot:hover {
              background-color: #717171;
            }
            
            /* Fading animation */
            .fade {
              animation-name: fade;
              animation-duration: 1.5s;
            }
            
            @keyframes fade {
              from {opacity: .4} 
              to {opacity: 1}
            }
            
            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
              .prev, .next,.text {font-size: 11px}
            }

            /* Profil kepala sekolah */
          .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 20%;
            border-radius: 12px;
            margin-left: 2%;
          }

          .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
          }

        .container {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-left: 2%;
          margin-right: 2%;
        }

        .content {
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top: 20px;
        }

        img {
          width: 300px;
          height: 300px;
          object-fit: cover;
          margin-right: 20px;
        }

        .intro {
          flex-grow: 1;
        }

        h3 {
          font-size: 24px;
          font-weight: bold;
          margin-bottom: 10px;
        }

        p {
          font-size: 18px;
          line-height: 1.5;
        }

        .top-right {
        position: absolute;
        top: 8px;
        right: 16px;
        float: right;
        }

    </style>
    </head>
    <body> 
        <div class="slideshow-container">
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="{{ asset('imgs/2.jpg') }}" style="width:100%; height:500px">
              <div class="top-right">
                <a href="{{ asset('pendaftaran') }}">Pendaftaran</a>
              </div>
              <div class="text">Caption Text</div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="{{ asset('imgs/3.jpg') }}" style="width:100%; height:500px">
              <div class="text">Caption Two</div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="{{ asset('imgs/1.png') }}" style="width:100%; height:500px">
              <div class="text">Caption Three</div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            </div>

            <div class="content">
              <div class="card">
                <img src="{{ asset('imgs/profile.jpg') }}" style="height:300px; border-top-left-radius:12px; border-top-right-radius:12px; border-bottom-right-radius: 12px; border-bottom-left-radius: 12px">
                  <div class ="nama" style="text-align: center">
                    <h4><b>John Doe</b></h4>
                    <p>Architect & Engineer</p>
                  </div>
              </div>
  
              <div class="container" style="height: 400px">
                <div class="intro">
                  <h3>Kata Pengantar dari Kepala Sekolah</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor elit a diam maximus iaculis. Vestibulum laoreet erat quis bibendum sagittis. Fusce in ex euismod, venenatis metus vitae, euismod eros. Nam euismod mauris vitae metus pharetra lacinia. Duis tincidunt nunc vitae pharetra fermentum. Integer tincidunt ultrices libero, vitae eleifend quam dapibus eget. Aliquam in enim ac velit sagittis varius a et nibh.</p>
                </div>
              </div>
            </div>

            <script>
                let slideIndex = 1;
                showSlides(slideIndex);
                
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }
                
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }
                
                function showSlides(n) {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  if (n > slides.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                }
                </script>
    </body>
    </html>
