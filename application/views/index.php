<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
  <script src="<?= base_url('assets/jquery.min.js') ?>"></script>
    <style>
      body {
        background: #f7f7f7;
      }

      nav {
        background: #ffffff;
      }

        .nav-link {
            width: 100%;
            margin: 3px 3px 3px 3px;
            font-family: 'Rubik', sans-serif;
            color: #000000;
            border: 1px solid transparent;
            transition: .3s
            border-radius: 10px;
            
        }
        .nav-link:hover {
            border: 1px solid #f26e2c;
            color: #f26e2c;
            border-radius: 10px;
        }

        .content-slider {
          width: 170px;
          height: 300px;
          background: #ffffff;
          margin: 0px 3px 0px 3px;
          border: 1px solid transparent;
          transition: .2s;
        }

        .content-slider img {
          width: 100%;
          height: 80%;
          object-fit: cover;
        }

        .content-slider p {
          font-size: 12px;
          color: #000000;
          transition: .3s;
        }

        .slider-title {
          font-size: 12px;
        }

        .link-content-slider {
          text-decoration: none;
        }

        .content-slider:hover {
          border: 1px solid #f26e2c;
        }

        .widget-header {
          border-bottom: 1px solid #000000;
          padding-bottom: 10px;
        }

        .widget-header a {
          font-family: 'Roboto', sans-serif;
          font-size: 20px;
          text-decoration: none;
          color: #000000;
          transition: .2s;
        }

        .widget-header a:hover {
          color: #f26e2c;
        }

        .card-slider {
          border: 1px solid transparent;
          transition: .2s;
          height: 270px;
        }

        .card-slider img {
          height: 80%;
          object-fit: cover;
        }

        .card-slider:hover {
          border: 1px solid #f26e2c;
        }

        .card-slider-link {
          text-decoration: none;
        }

        /* medium */
        @media screen and (max-width: 991px){
      
        }

        /* small */
        @media screen and (max-width: 767px){
           
        }

        /* extra small */
        @media screen and (max-width: 575px){
          .content-slider {
            height: 220px;
            width: 100px;
          }

          .content-slider p {
            font-size: 8px;
          }

          .slider-title {
            font-size: 8px;
          }

          .card-slider {
            height: 200px;
          }
        }


    </style>

  <title>Document</title>
</head>
<body>



<nav class="navbar navbar-expand-lg fixed-top mb-5" style="box-shadow: 0px 4px 0px #f26e2c;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav text-center ms-auto" style="align-items: center">
        <a class="nav-link" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link" href="#">Disabled</a>
      </div>
    </div>
  </div>
</nav>

<div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">

  <div class="widget-header mb-1">
    <a href="<?= base_url('anime/season_now') ?>">Seasonal Anime</a>
  </div>
   

  <p class="placeholder-glow" id="loading-list-season-now">
    <span class="placeholder col-12"></span>
    <span class="placeholder col-12"></span>
    <span class="placeholder col-12"></span>
  </p>

  <div class="my-slider d-none" id="list-season-now">
  </div>


  <div class="row mt-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-7">

      <div class="widget-header mb-1">
        <a href="<?= base_url('anime/recommendation') ?>">Recommendation Anime</a>
      </div>
      <p class="placeholder-glow" id="loading-list-recommendation">
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
      </p>
      <div class="my-slider1 row d-none" id="load_list_recommendation">
      </div>



      <div class="widget-header mb-1 mt-3">
        <a href="<?= base_url('manga/recommendation') ?>">Recommendation Manga</a>
      </div>
      <p class="placeholder-glow" id="loading-list-recommendation_manga">
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
      </p>
      <div class="my-slider2 row d-none" id="load_list_recommendation_manga">
      </div>

    </div>
  </div>

</div>
  

<script>
  $(document).ready(function(){
    get_list_season_now();
    get_recommendation_anime();
    get_recommendation_manga();
  })

  function slider(container, desktop, tab, mobile){
    let slider = tns({
      container: container,
      "slideby" : "1",
      "speed" : 400,
      "nav": false,
      autoplay: true,
      controls: true,
      "mouseDrag": true,
      autoplayButtonOutput: false,
      "lazyload": true,
      responsive: {
        1600: {
          items: desktop,
          gutter: 0
        },

        1024: {
          items: desktop,
          gutter: 0
        },

        768: {
          items: tab,
          gutter: 0
        },

        480: {
          items: mobile,
          gutter: 0
        },

        360: {
          items: mobile,
          gutter: 0
        }
      }
    });
    $('.tns-controls').addClass('d-none');
  }


  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }
  

  function get_list_season_now(){
    const desktop = 6;
    const tab = 4;
    const mobile = 3;
    const container = '.my-slider';

    $.ajax({
      url: 'https://api.jikan.moe/v4/seasons/now',
      type: 'GET',
      dataType: 'JSON',
      success: function(d){

        if(d.status == 400){
          alert('error');
        } else {
          $('#loading-list-season-now').addClass('d-none');
          $('#list-season-now').removeClass('d-none');
          let data = d.data;
          let html = '';

          for(let i = 0; i < data.length; i++){
            let image = data[i].images.webp.image_url;
            html += '<a href="" class="link-content-slider"><div class="content-slider"><img src="'+image+'" alt="img-content-slider"><div class="text-center"><p>'+data[i].title+'</p></div></div></a>';
          }

          $('#list-season-now').html(html);
          slider(container, desktop, tab, mobile);

        }

      }
    })
  }

  function get_recommendation_anime(){
    const desktop = 4;
    const tab = 4;
    const mobile = 3;
    const container = '.my-slider1';

    $.ajax({
      url: 'https://api.jikan.moe/v4/recommendations/anime',
      type: 'GET',
      dataType: 'JSON',
      success: function(d){
        
        if(d.status == 400){
          alert('error');
        } else {
          $('#loading-list-recommendation').addClass('d-none');
          $('#load_list_recommendation').removeClass('d-none');


          let data = d.data;
          const new_data = shuffleArray(data);
          const limit = new_data.slice(0, 5);
          
          let html = '';
          for(let a = 0; a < limit.length; a++){
            let get_data = limit[a].entry;

            for(let i= 0; i < get_data.length; i++){
              let img = get_data[i].images.webp.image_url;
              let title = get_data[i].title;
              html += '<div class="col-4 col-sm-4 col-md-4 col-lg-3"><a href="" class="card-slider-link"><div class="card card-slider"><img src="'+img+'" class="w-100" alt="img-slider"><div class="mx-1 my-1"><p class="slider-title">'+title+'</p></div></div></a></div>'
            }

          }

          $('#load_list_recommendation').html(html);
          slider(container, desktop, tab, mobile);
        }

      }
    })
  }

  function get_recommendation_manga(){
    const desktop = 4;
    const tab = 4;
    const mobile = 3;
    const container = '.my-slider2';

    $.ajax({
      url: 'https://api.jikan.moe/v4/recommendations/manga',
      type: 'GET',
      dataType: 'JSON',
      success: function(d){
        if(d.status == 400){
          alert('error');
        } else {
          $('#loading-list-recommendation_manga').addClass('d-none');
          $('#load_list_recommendation_manga').removeClass('d-none');

          let data = d.data;
          const new_data = shuffleArray(data);
          const limit = new_data.slice(0, 5);
          
          let html = '';
          for(let a = 0; a < limit.length; a++){
            let get_data = limit[a].entry;

            for(let i= 0; i < get_data.length; i++){
              let img = get_data[i].images.webp.image_url;
              let title = get_data[i].title;
              html += '<div class="col-4 col-sm-4 col-md-4 col-lg-3"><a href="" class="card-slider-link"><div class="card card-slider"><img src="'+img+'" class="w-100" alt="img-slider"><div class="mx-1 my-1"><p class="slider-title">'+title+'</p></div></div></a></div>'
            }

          }

          $('#load_list_recommendation_manga').html(html);
          slider(container, desktop, tab, mobile);

        }


      }
    })
  }


  

</script>


</body>
</html>