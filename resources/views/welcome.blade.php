<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        scroll-behavior: smooth !important;
      }

      .sec {
        width: 100%;
        height: 100vh;
        background-image: url(images/bg.png);
        background-size: cover;
        background-position: center;
      }

      #btn-back-to-top {
        position: fixed;
        bottom: 100px;
        right: 20px;
        display: none;
      }

      @media screen and (max-width:767px) {
        #img-accueill {
          position: relative;
          right: 130px;
        }

        #stck {
          padding-top: 300px;
        }
      }
    </style>
</head>
<body>

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-5 col-sm-12" style="margin-top:180px ;">
          <h1>WELCOME TO<span class="text-success"> AYA LIBRARY</span> </h1>
          <p><b class="text-capitalize">with books delivered home or in the office, enjoy reading anywhere!</b></p>
          <p class="w-75 text-capitalize ">get your favorite books without having to move, available in all Moroccan cities</p>
  </div>
     <main class="col-lg-6 col-sm-12 pic" id="img-accueill"><img src="{{asset('images/cover2.png')}}" id="img1" alt="" style="width: 650px; margin:120px 0px 0px 80px;"></main>
  </div>

  </div>
  <div class="container mb-5 stock"><h1 class="text-uppercase">In our <span class="text-success">stock</h1></span> </div>
  <button type="button" style="background-color:#B531A5;" class="btn btn-light text-light btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
  </button>
  <x-welcome-livre :livres="$livres"/>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function() {
  let mybutton = document.getElementById("btn-back-to-top");

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  mybutton.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
});
</script>
</body>
</html>
