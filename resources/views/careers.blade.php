@extends('layouts.frontend')

@push('careers-css')
    <link rel="stylesheet" href="{{asset('dist/css/careers.css')}}">
@endpush

@section('title')
{{'Careers'}}
@endsection

@section('description')
{{'Explore the exciting career opportunities at this innovative tech startup in the hospitality industry. Join our team of passionate and driven individuals making a difference!'}}
@endsection

@section('content')

<div class="container" id="main">
    <div class="careers-header">
      <h1>Careers</h1>
      <p>
        Looking for a place to supercharge your aspirations and bring your
        wildest dreams to life? Look no further than Orderchimps! With the
        power to make a real difference, you'll have the opportunity to create
        those unforgettable moments that'll have you grinning from ear to ear
        whenever you reminisce about them. Come join us and let's make some
        magic happen!
      </p>
    </div>

    <div class="careers-body">
      <div class="cards">
        @foreach ($vacancies as $vacancy)
        <div class="expanding-card">
         <div class="card-content">
           <div class="card-header">
             <div class="title"><h4>{{$vacancy["title"]}}</h4></div>
             <div class="card-description">
               @foreach ($vacancy["description-paras"] as $para)
                   <p>{{$para}}</p>
               @endforeach
             </div>
           </div>
   
           <div class="expansion">
             <div class="card-body">
               <div class="visible-area">
                 <h4>Responsibilities</h4>
                 <ul class="custom-bullet doodle-dot">
                   @foreach ($vacancy["responsibilities"] as $responsibility)
                   <li>{{$responsibility}}</li>
                   @endforeach
                 </ul>
               </div>
             </div>
   
             <div class="visible-area">
               <h4>Requirements</h4>
               <ul class="custom-bullet doodle-dot">
                 @foreach ($vacancy["requirements"] as $requirement)
                   <li>{{$requirement}}</li>
                   @endforeach               
               </ul>
               <div class="card-footer">
                 <h5></h5>
                 <p></p>
                 <a class="apply-btn" href="{{$vacancy["apply_link"]}}">Apply Now</a>
               </div>
             </div>
           </div>
         </div>
         <a href="/vacancy/{{$vacancy["id"]}}" >
         <div class="expand-button">
          Full Descripton
          </div>
        </a>
       </div>
        @endforeach
      </div>

      <script>
        // const expandingBtns = document.querySelectorAll(".expand-button");
        // for (const btn of expandingBtns) {
        //   btn.addEventListener("click", (e) => {
        //     const parent = e.target.parentElement;
        //     const overlay = document.querySelector("#overlay")

            
        //     console.log(btn.getAttribute("opened"));
            
        //     if (btn.getAttribute("opened") !== 'true') {
              

        //     parent.style.position = "absolute";
        //     parent.style.left = "15%";
        //     parent.style.right = "15%";
        //     parent.style.top = "6rem";
        //     parent.querySelector(".card-content").style.backgroundColor = "white";
        //     parent.style.zIndex = 29;
            
        //     overlay.classList.add("active");
        //     parent
        //       .querySelector(".card-content")
        //       .querySelector(".expansion")
        //       .classList.add("active-card");

        //     // parent.offsetHeight;
        //     // parent.classList.toggle("active-parent");
        //     btn.innerText = "Close"
        //     btn.setAttribute("opened", true);
        //     parent.querySelector(".title").focus();
        //     document.body.scrollTop = 0;
        //     document.documentElement.scrollTop = 0;
        //   }else if(btn.getAttribute("opened") === 'true'){
        //     parent.style.position = "relative";
        //     parent.style.left = "";
        //     parent.style.right = "";
        //     parent.style.top = "";
        //     parent.querySelector(".card-content").style.backgroundColor = "";
        //     parent.style.zIndex = 0;
            
        //     overlay.classList.remove("active");
        //     parent
        //     .querySelector(".card-content")
        //     .querySelector(".expansion")
        //     .classList.remove("active-card");
        //     btn.innerText = "Full Description"
        //       btn.setAttribute("opened", false);
        //     }
            
        //   });
        }
      </script>
    </div>
  </div>


@endsection