<style>
  .copyBox-fa {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    align-items: center;
    max-width: 400px;
    background: #FFFFFF;
    border-radius: 9px;
    border: 1.069px solid rgba(59, 178, 128, 0.40);
    background: #FFF;
    width: 100%;
    height: 60px;
}

.coupon-icon {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 13%;
    border-right:  1.069px solid rgba(59, 178, 128, 0.40);
}

.copyBox-fa input#myInput {
    width: 55%;
    height: 50px;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    text-align: center;
    line-height: 29px;
    color: rgba(100, 100, 100, 0.9);
    /*padding: 10px;*/
    border: none;
}
.rzinput2 img{
    margin-right: 5px;
}

button.rzinput2 {
    width: 30%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    color: #fff;
    border-radius: 7.032px;
background: linear-gradient(180deg, #70C989 0%, #3BB280 100%);
    /*margin-right: 5px;*/
    height: 47px;
    border: none;
}


#coupon-alert{
    color: #000;
}


</style>
<div class="copyBox-fa">
    <div class="coupon-icon">
        <img src="https://www.istudy.org.uk/wp-content/uploads/2023/08/Group-1000004033-2-1.png">
    </div>
    <input id="myInput" class="rzinput1" type="text" value="LUCKYU" readonly=""><button class="rzinput2" onclick=" myFunction()"><img src="https://www.istudy.org.uk/wp-content/uploads/2023/08/Vector-4-1.png"> Copy</button>
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
