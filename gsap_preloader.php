<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

<style>
	

.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #0c0a0b;
  overflow: hidden;
  z-index: 100;
	}
  .text-container {
    display: flex;
    flex-direction: row;
    gap: 1em;
    overflow: hidden;
    color: white;
    opacity: 0;
		
  }
	.big-text {
		font-family: 'Bebas Neue', sans-serif; 
		font-size: 5rem;
	}
	
</style>



<div class="preloader">
  <div class="text-container">
    <h1 class="big-text">GSAP IS COOL</h1>
    <h1 class="big-text">PRELOADER</h1>
    <h1 class="big-text">ANIMATION</h1>
</div>    
</div> 


 
<script>
	
	
const tl = gsap.timeline();
 

tl.to("body", {
  overflow: "hidden",
	
})
  .to(".preloader .text-container", {
    duration: 0,
    opacity: 1,
	
    ease: "Power3.easeOut"
  })
  .from(".preloader .text-container h1", {
    duration: 1.5,
    delay: 0.2,
    y: 200,
    skewY: 10,
    stagger: 0.4,
	
    ease: "Power3.easeOut"
  })
  .to(".preloader .text-container h1", {
    duration: 1.2,
    y: 200,
    skewY: -20,
    stagger: 0.2,
	
    ease: "Power3.easeOut"
  })
  .to(".preloader", {
    duration: 1,
	
        
    height: "0vh",
    ease: "Power3.easeOut"
  })
  .to(
    "body",
    {
      overflow: "auto"
    },
    "-=1"
  )
  .to(".preloader", {
    display: "none",
  });
</script>
