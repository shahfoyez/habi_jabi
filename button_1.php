<style>
  .copyBox-fa {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    align-items: center;
    max-width: 390px;
    background: #FFFFFF;
    border: 1.19976px solid rgba(16, 94, 166, 0.15);
    border-radius: 8px;
    width: 100%;
    height: 62px;
}

 

.copyBox-fa input#myInput {
    border-radius: 8px;
    width:  70%;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    text-align: center;
    line-height: 29px;
    color: rgba(100, 100, 100, 0.9);
    padding: 10px;
    border: none;
}

button.rzinput2 {
    width:28%;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    color: #2B354E;
 
    border-radius: 8px;
    height: calc(100% - 10px);
    border: none;
    margin-right: 5px;
    
    border-radius: 8px;
    background: var(--yello-linear, linear-gradient(180deg, #FFC93E 0%, #FFAC0C 100%));
}


#coupon-alert{
    color: #fff;
    margin-left: 30px;
}


</style>
<div class="copyBox-fa">
    <div class="coupon-icon">
         
    </div>
    <input id="myInput" class="rzinput1" type="text" value="STUDY99" readonly=""><button class="rzinput2" onclick=" myFunction()">  Copy</button>
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
