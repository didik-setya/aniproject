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
    <div class="col-12 col-sm-12 col-md-12 col-lg-8">

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

    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
      <div class="widget-header mb-1">
        <a href="<?= base_url('anime/top') ?>">Most Top Anime</a>
      </div>


      <div id="load_sidebar_content" class="d-none">
      </div>

      <p class="placeholder-glow" id="loading_sidebar_content">
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12"></span>
      </p>

    </div>
  </div>

</div>

<script>
  $(document).ready(function(){
    get_list_season_now();
    get_recommendation_anime();
    get_recommendation_manga();
    get_top_anime();
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

  function get_top_anime(){
    $.ajax({
      url: 'https://api.jikan.moe/v4/top/anime',
      type: 'GET',
      dataType: 'JSON',
      success: function(d){
        if(d.status == 400){
          alert('Error');
        } else {
          let data = d.data;
          let limit_data = data.slice(0, 5);
          let html = '';

          for(let i = 0; i < limit_data.length; i++){
            const img = limit_data[i].images.webp.image_url;
            const member = limit_data[i].members;
            const new_member = member.toLocaleString();

            html += '<div class="content-sidebar"><a href=""><div class="row" style="height: 100%"><div class="col-3" style="height: 100%"><img src="'+img+'" alt=""></div><div class="col-9" style="height: 100%"><h4 class="float-end"><span class="badge bg-danger">'+limit_data[i].score+'</span></h4><p><b>'+limit_data[i].title+'</b></p><small class="text-secondary">'+limit_data[i].type+', '+limit_data[i].season+' '+limit_data[i].year+'</small> <br><small class="text-secondary">'+new_member+' members</small></div></div></a></div>';

          }

          $('#load_sidebar_content').html(html);
          $('#load_sidebar_content').removeClass('d-none');
          $('#loading_sidebar_content').addClass('d-none');
          
        }
      }
    })
  }

  

</script>