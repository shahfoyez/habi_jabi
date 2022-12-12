// send action
<button type="button" onClick="this.disabled=true; this.innerText='Sending…'; ">Send</button>

// send action
function submitAction() {
    $button = document.getElementById('foy_btn');
    $button.disabled = true;
    $button.innerText = 'Sending...';
};
