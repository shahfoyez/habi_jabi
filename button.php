<style>
  .copyBox-fa {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    align-items: center;
    max-width: 460px;
    background: #FFFFFF;
    border: 1.19976px solid rgba(16, 94, 166, 0.15);
    border-radius: 10.5215px;
    width: 100%;
    height: 68px;
}

.coupon-icon {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    border-right: 1px solid rgba(16, 94, 166, 0.15);
}

.copyBox-fa input#myInput {
    width: calc(100% - 175px);
    height: 100%;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    text-align: center;
    line-height: 29px;
    color: rgba(100, 100, 100, 0.9);
    padding: 10px;
    border: none;
}

button.rzinput2 {
    width: 120px;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    color: #fff;
    background: #1948C0;
    border-radius: 7px;
    height: calc(100% - 10px);
    border: none;
    margin-right: 5px;
}


#coupon-alert{
    color: #fff;
    margin-left: 30px;
}


</style>
<div class="copyBox-fa">
    <div class="coupon-icon">
        <img src=" http://theanimalcare.org/wp-content/uploads/2023/06/Promo-Code-6.png">
    </div>
    <input id="myInput" class="rzinput1" type="text" value="STUDY99" readonly=""><button class="rzinput2" onclick=" myFunction()"><img src="http://theanimalcare.org/wp-content/uploads/2023/06/Group-1000003963-1.png"> Copy</button>
</div>


<p id="coupon-alert"></p>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  
  document.getElementById("coupon-alert").innerHTML = "Coupon Code Copied. Apply to Cart";
  
  setTimeout(function(){
        document.getElementById("coupon-alert").innerHTML = "";
  },3000)
  //alert("Copied the text: " + copyText.value);
}
</script>
