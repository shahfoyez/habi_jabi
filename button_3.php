<style>
  .copyBox-fa {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 421px;
    background: #fff;
    padding: 0;
border: 1px solid rgba(0, 157, 75, 0.5);
border-radius: 15px;
}

.copyBox-fa input#myInput {
    width: 70%;
    background: transparent;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    text-align: center;
    line-height: 29px;
    color: #2B354E;
    padding: 7px;
    border: 0;
}

button.rzinput2 {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    color: #ffffff;
    background: linear-gradient(180deg, #4DAD33 0%, #307330 100%);
SVG
;
    border-radius: 0px 10px 10px 0px;
    padding: 10px 30px;
    height: 50px;
    border: none;
}

#coupon-alert{
    color: #000;
}

@media (max-width: 767px){
    .copyBox-fa{
        margin: auto;
    }
}
    

</style>
<div class="copyBox-fa"><input id="myInput" class="rzinput1" type="text" value="LUCKYU" readonly/>
<button class="rzinput2" onclick=" myFunction()">Copy</button>

</div>
<p id='coupon-alert'></p>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('coupon-alert').innerHTML = "Coupon Code Copied. Apply code in Cart."; 
  
  setTimeout(function(){
       document.getElementById('coupon-alert').innerHTML = ""; 
  } ,3000)
}
</script>
