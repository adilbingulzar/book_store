@extends('layouts.default')

@section('content')

<div class="content-body">
  <div class="row">
    <div class="col-12">
      <div class="alert alert-primary" role="alert">
        <div class="alert-body">
          <!-- Bordered table start -->
          <div class="row" id="table-bordered">
            <div class="col-12">
              <div class="card">
                <div class="card-header border-bottom p-1">
                  <div class="head-label">
                    <h6 class="mb-0">Array Rotation</h6>
                  </div>
                </div>
                <div class="card-body">
                  @if(session()->has('message'))
                  <div class="alert alert-success mt-2 px-2 py-2" role="alert">
                    {{ session()->get('message') }}
                  </div>
                  @endif
                  <form class="dt_adv_search mt-2" method="get" action="">
                    <div class="row g-1 mb-md-1">
                      <div class="col-md-4">
                        <label class="form-label">Array:</label>
                        <input
                          type="text"
                          id="array"
                          name="author"
                          class="form-control dt-input dt-full-name"
                          data-column="1"
                          placeholder="Insert Comma Separated Numbers"
                          data-column-index="0"
                          />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Rotation:</label>
                        <input
                          type="number"
                          id="number"
                          name="book_name"
                          class="form-control dt-input"
                          data-column="3"
                          placeholder="Numbr of Rotations"
                          data-column-index="2"
                          />
                      </div>
                      
                    </div>
                    <div class="row g-1">
                      <div class="col-md-2">
                        <button id="find_button" type="submit" class="btn btn-primary data-submit w-100 mt-md-1">
                          Find
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Bordered table end -->
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  document.getElementById("find_button").addEventListener("click", function(event){
    event.preventDefault();


    const arrayValue  = document.getElementById('array').value;
    const numberValue = document.getElementById('number').value;

    let error = false;

    let rotationArray = [];

    if(arrayValue.includes(",")==false) {
      alert("Insert Comma Separated Numbers")
      error = true;
    }else{
      const explodedArray = arrayValue.split(",");

      explodedArray.forEach(item=>{
        
        if(isNaN(item)){
          alert(item + " is not a number");
          error = true;
        }else if(item<-1000 || item>1000){
          alert("Element should be in the range from -1000 to 1000");
          error = true;
        }else{
          rotationArray.push(item.trim());
        }

      });

      if(error == false && rotationArray) { 
        for (i = 0; i < numberValue; i++){
          rotationArray.unshift(rotationArray.pop())  
        } 
        alert(rotationArray)
      }
    }

  });

  function calculate() {

    // console.log("ASDASD" , object)
    // let action = '/update/'+object.id;
    // document.getElementById("edit_form").setAttribute("action", action)

    // document.getElementById('edit_author').value = object.author;
    // document.getElementById('edit_book').value = object.book_name;
    // document.getElementById('edit_publish_date').value = object.publish_year;
    // document.getElementById('edit_inlineCheckbox1').checked = object.best_seller=='1'?true:false;
  }
</script>
@endsection