<button type="button" onClick="this.disabled=true; this.innerText='Sending…'; ">Send</button>
function submitAction() {
    $button = document.getElementById('foy_btn');
    $button.disabled = true;
    $button.innerText = 'Sending...';
};
