<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
<style>
.page_404{ 

  background:#fff; 
  font-family: 'Arvo', serif;
}

.page_404  img{width:100%;}

.four_zero_four_bg{
 
    background-image: url("{{asset('assets/images/error.gif')}}");
    height: 400px;
    background-position: center;
    -webkit-background-size: contain;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    background-repeat: no-repeat;
 }
 
 .text-center{
  text-align: center;
 }
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
       font-size:80px;
       }
       
       .link_404{      
  color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
  .contant_box_404{ margin-top:-50px;}
</style>

<div class="text-center">
  <img src="{{asset('/assets/images/logo/medicoal.png')}}" width="70px" style="padding-top: 3rem" alt="">
</div>
<div class="page_404 ">
  <div class="container">
    <div class="row"> 
      <div class="col-sm-12">
        <div class="col-sm-12 col-sm-offset-1 text-center">
          <div class="four_zero_four_bg ">
            
      <h1 class="text-dark">404</h1>
    </div>
    
    <div class="contant_box_404">
      <h3 class="text-dark">
          Halaman tidak ditemukan.
      </h3>
  
    
  </div>
    </div>
    </div>
    </div>
  </div>
</div>
