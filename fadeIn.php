.test{
  /*transform: skew(-10deg);*/
  /*animation-delay: 0s,.3s;*/
  /*animation-timing-function: ease-out,ease-in-out;*/
  /*animation-iteration-count: 1,infinite;*/
  /*animation-fill-mode: forwards;*/
  /*animation-direction: normal,alternate;*/
  /*animation-duration: .3s,1.5s;*/
  /*animation-delay: 0s,.3s;*/
  /*animation-timing-function: ease-out,ease-in-out;*/
  /*animation-iteration-count: 1,infinite;*/
  /*animation-fill-mode: forwards;*/
  /*animation-direction: normal,alternate;*/
  /*transform: translateY(8px);*/
  /*animation-name: elementor-animation-pulse-grow;*/
  /*animation-duration: .3s;*/
  /*animation-timing-function: linear;*/
  /*animation-iteration-count: infinite;*/
  /*animation-direction: alternate;*/
  /*transition-duration: .3s;*/
  /*transition-property: transform;*/
  /*transform: scale(1.1);*/
}
.foy-animation:hover {
    animation-name: pulse;
    animation-duration: 1s;
    animation-fill-mode: both;
    animation-iteration-count: 5;
    animation-timing-function: linear;
    transform-origin: center bottom;
    transform: scale(1.1);
    animation-delay: 0s,.3s;
}

@keyframes bounce {
    20%,53%,80%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1);
        transform: translate3d(0,0,0)
    }

    40%,43% {
        animation-timing-function: cubic-bezier(.755,.050,.855,.060);
        transform: translate3d(0,-30px,0)
    }

    70% {
        animation-timing-function: cubic-bezier(.755,.050,.855,.060);
        transform: translate3d(0,-15px,0)
    }

    90% {
        transform: translate3d(0,-4px,0)
    }
}

.bounce {
    animation-name: bounce;
    transform-origin: center bottom;
}

@keyframes flash {
    50%,from,to {
        opacity: 1
    }

    25%,75% {
        opacity: 0
    }
}

.flash {
    animation-name: flash
}

@keyframes pulse {
    from,to {
        transform: scale3d(1,1,1)
    }

    50% {
        transform: scale3d(1.05,1.05,1.05)
    }
}

.pulse {
    animation-name: pulse
}

@keyframes rubberBand {
    from,to {
        transform: scale3d(1,1,1)
    }

    30% {
        transform: scale3d(1.25,.75,1)
    }

    40% {
        transform: scale3d(.75,1.25,1)
    }

    50% {
        transform: scale3d(1.15,.85,1)
    }

    65% {
        transform: scale3d(.95,1.05,1)
    }

    75% {
        transform: scale3d(1.05,.95,1)
    }
}

.rubberBand {
    animation-name: rubberBand
}

@keyframes shake {
    from,to {
        transform: translate3d(0,0,0)
    }

    10%,30%,50%,70%,90% {
        transform: translate3d(-10px,0,0)
    }

    20%,40%,60%,80% {
        transform: translate3d(10px,0,0)
    }
}

.shake {
    animation-name: shake
}

@keyframes headShake {
    0% {
        transform: translateX(0)
    }

    6.5% {
        transform: translateX(-6px) rotateY(-9deg)
    }

    18.5% {
        transform: translateX(5px) rotateY(7deg)
    }

    31.5% {
        transform: translateX(-3px) rotateY(-5deg)
    }

    43.5% {
        transform: translateX(2px) rotateY(3deg)
    }

    50% {
        transform: translateX(0)
    }
}

.headShake {
    animation-timing-function: ease-in-out;
    animation-name: headShake
}

@keyframes swing {
    20% {
        transform: rotate3d(0,0,1,15deg)
    }

    40% {
        transform: rotate3d(0,0,1,-10deg)
    }

    60% {
        transform: rotate3d(0,0,1,5deg)
    }

    80% {
        transform: rotate3d(0,0,1,-5deg)
    }

    to {
        transform: rotate3d(0,0,1,0deg)
    }
}

.swing {
    transform-origin: top center;
    animation-name: swing
}

@keyframes tada {
    from,to {
        transform: scale3d(1,1,1)
    }

    10%,20% {
        transform: scale3d(.9,.9,.9) rotate3d(0,0,1,-3deg)
    }

    30%,50%,70%,90% {
        transform: scale3d(1.1,1.1,1.1) rotate3d(0,0,1,3deg)
    }

    40%,60%,80% {
        transform: scale3d(1.1,1.1,1.1) rotate3d(0,0,1,-3deg)
    }
}

.tada {
    animation-name: tada
}

@keyframes wobble {
    from,to {
        transform: none
    }

    15% {
        transform: translate3d(-25%,0,0) rotate3d(0,0,1,-5deg)
    }

    30% {
        transform: translate3d(20%,0,0) rotate3d(0,0,1,3deg)
    }

    45% {
        transform: translate3d(-15%,0,0) rotate3d(0,0,1,-3deg)
    }

    60% {
        transform: translate3d(10%,0,0) rotate3d(0,0,1,2deg)
    }

    75% {
        transform: translate3d(-5%,0,0) rotate3d(0,0,1,-1deg)
    }
}

.wobble {
    animation-name: wobble
}

@keyframes jello {
    11.1%,from,to {
        transform: none
    }

    22.2% {
        transform: skewX(-12.5deg) skewY(-12.5deg)
    }

    33.3% {
        transform: skewX(6.25deg) skewY(6.25deg)
    }

    44.4% {
        transform: skewX(-3.125deg) skewY(-3.125deg)
    }

    55.5% {
        transform: skewX(1.5625deg) skewY(1.5625deg)
    }

    66.6% {
        transform: skewX(-.78125deg) skewY(-.78125deg)
    }

    77.7% {
        transform: skewX(.390625deg) skewY(.390625deg)
    }

    88.8% {
        transform: skewX(-.1953125deg) skewY(-.1953125deg)
    }
}

.jello {
    animation-name: jello;
    transform-origin: center
}

@keyframes bounceIn {
    20%,40%,60%,80%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1)
    }

    0% {
        opacity: 0;
        transform: scale3d(.3,.3,.3)
    }

    20% {
        transform: scale3d(1.1,1.1,1.1)
    }

    40% {
        transform: scale3d(.9,.9,.9)
    }

    60% {
        opacity: 1;
        transform: scale3d(1.03,1.03,1.03)
    }

    80% {
        transform: scale3d(.97,.97,.97)
    }

    to {
        opacity: 1;
        transform: scale3d(1,1,1)
    }
}

.bounceIn {
    animation-name: bounceIn
}

@keyframes bounceInDown {
    60%,75%,90%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1)
    }

    0% {
        opacity: 0;
        transform: translate3d(0,-3000px,0)
    }

    60% {
        opacity: 1;
        transform: translate3d(0,25px,0)
    }

    75% {
        transform: translate3d(0,-10px,0)
    }

    90% {
        transform: translate3d(0,5px,0)
    }

    to {
        transform: none
    }
}

.bounceInDown {
    animation-name: bounceInDown
}

@keyframes bounceInLeft {
    60%,75%,90%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1)
    }

    0% {
        opacity: 0;
        transform: translate3d(-3000px,0,0)
    }

    60% {
        opacity: 1;
        transform: translate3d(25px,0,0)
    }

    75% {
        transform: translate3d(-10px,0,0)
    }

    90% {
        transform: translate3d(5px,0,0)
    }

    to {
        transform: none
    }
}

.bounceInLeft {
    animation-name: bounceInLeft
}

@keyframes bounceInRight {
    60%,75%,90%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1)
    }

    from {
        opacity: 0;
        transform: translate3d(3000px,0,0)
    }

    60% {
        opacity: 1;
        transform: translate3d(-25px,0,0)
    }

    75% {
        transform: translate3d(10px,0,0)
    }

    90% {
        transform: translate3d(-5px,0,0)
    }

    to {
        transform: none
    }
}

.bounceInRight {
    animation-name: bounceInRight
}

@keyframes bounceInUp {
    60%,75%,90%,from,to {
        animation-timing-function: cubic-bezier(.215,.61,.355,1)
    }

    from {
        opacity: 0;
        transform: translate3d(0,3000px,0)
    }

    60% {
        opacity: 1;
        transform: translate3d(0,-20px,0)
    }

    75% {
        transform: translate3d(0,10px,0)
    }

    90% {
        transform: translate3d(0,-5px,0)
    }

    to {
        transform: translate3d(0,0,0)
    }
}

.bounceInUp {
    animation-name: bounceInUp
}

@keyframes fadeIn {
    from {
        opacity: 0
    }

    to {
        opacity: 1
    }
}

.fadeIn {
    animation-name: fadeIn
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translate3d(0,-100%,0)
    }

    to {
        opacity: 1;
        transform: none
    }
}

.fadeInDown {
    animation-name: fadeInDown
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translate3d(-100%,0,0)
    }

    to {
        opacity: 1;
        transform: none
    }
}

.fadeInLeft {
    animation-name: fadeInLeft
}
 
@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translate3d(100%,0,0)
    }

    to {
        opacity: 1;
        transform: none
    }
}

.fadeInRight {
    animation-name: fadeInRight
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate3d(0,100%,0)
    }

    to {
        opacity: 1;
        transform: none
    }
}

.fadeInUp {
    animation-name: fadeInUp
}

@keyframes lightSpeedIn {
    from {
        transform: translate3d(100%,0,0) skewX(-30deg);
        opacity: 0
    }

    60% {
        transform: skewX(20deg);
        opacity: 1
    }

    80% {
        transform: skewX(-5deg);
        opacity: 1
    }

    to {
        transform: none;
        opacity: 1
    }
}

.lightSpeedIn {
    animation-name: lightSpeedIn;
    animation-timing-function: ease-out
}

@keyframes rotateIn {
    from {
        transform-origin: center;
        transform: rotate3d(0,0,1,-200deg);
        opacity: 0
    }

    to {
        transform-origin: center;
        transform: none;
        opacity: 1
    }
}

.rotateIn {
    animation-name: rotateIn
}

@keyframes rotateInDownLeft {
    from {
        transform-origin: left bottom;
        transform: rotate3d(0,0,1,-45deg);
        opacity: 0
    }

    to {
        transform-origin: left bottom;
        transform: none;
        opacity: 1
    }
}

.rotateInDownLeft {
    animation-name: rotateInDownLeft
}

@keyframes rotateInDownRight {
    from {
        transform-origin: right bottom;
        transform: rotate3d(0,0,1,45deg);
        opacity: 0
    }

    to {
        transform-origin: right bottom;
        transform: none;
        opacity: 1
    }
}

.rotateInDownRight {
    animation-name: rotateInDownRight
}

@keyframes rotateInUpLeft {
    from {
        transform-origin: left bottom;
        transform: rotate3d(0,0,1,45deg);
        opacity: 0
    }

    to {
        transform-origin: left bottom;
        transform: none;
        opacity: 1
    }
}

.rotateInUpLeft {
    animation-name: rotateInUpLeft
}

@keyframes rotateInUpRight {
    from {
        transform-origin: right bottom;
        transform: rotate3d(0,0,1,-90deg);
        opacity: 0
    }

    to {
        transform-origin: right bottom;
        transform: none;
        opacity: 1
    }
}

.rotateInUpRight {
    animation-name: rotateInUpRight
}

@keyframes rollIn {
    from {
        opacity: 0;
        transform: translate3d(-100%,0,0) rotate3d(0,0,1,-120deg)
    }

    to {
        opacity: 1;
        transform: none
    }
}

.rollIn {
    animation-name: rollIn
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale3d(.3,.3,.3)
    }

    50% {
        opacity: 1
    }
}

.zoomIn {
    animation-name: zoomIn
}

@keyframes zoomInDown {
    from {
        opacity: 0;
        transform: scale3d(.1,.1,.1) translate3d(0,-1000px,0);
        animation-timing-function: cubic-bezier(.55,.055,.675,.19)
    }

    60% {
        opacity: 1;
        transform: scale3d(.475,.475,.475) translate3d(0,60px,0);
        animation-timing-function: cubic-bezier(.175,.885,.32,1)
    }
}

.zoomInDown {
    animation-name: zoomInDown
}

@keyframes zoomInLeft {
    from {
        opacity: 0;
        transform: scale3d(.1,.1,.1) translate3d(-1000px,0,0);
        animation-timing-function: cubic-bezier(.55,.055,.675,.19)
    }

    60% {
        opacity: 1;
        transform: scale3d(.475,.475,.475) translate3d(10px,0,0);
        animation-timing-function: cubic-bezier(.175,.885,.32,1)
    }
}

.zoomInLeft {
    animation-name: zoomInLeft
}

@keyframes zoomInRight {
    from {
        opacity: 0;
        transform: scale3d(.1,.1,.1) translate3d(1000px,0,0);
        animation-timing-function: cubic-bezier(.55,.055,.675,.19)
    }

    60% {
        opacity: 1;
        transform: scale3d(.475,.475,.475) translate3d(-10px,0,0);
        animation-timing-function: cubic-bezier(.175,.885,.32,1)
    }
}

.zoomInRight {
    animation-name: zoomInRight
}

@keyframes zoomInUp {
    from {
        opacity: 0;
        transform: scale3d(.1,.1,.1) translate3d(0,1000px,0);
        animation-timing-function: cubic-bezier(.55,.055,.675,.19)
    }

    60% {
        opacity: 1;
        transform: scale3d(.475,.475,.475) translate3d(0,-60px,0);
        animation-timing-function: cubic-bezier(.175,.885,.32,1)
    }
}

.zoomInUp {
    animation-name: zoomInUp
}

@keyframes slideInDown {
    from {
        transform: translate3d(0,-100%,0);
        visibility: visible
    }

    to {
        transform: translate3d(0,0,0)
    }
}

.slideInDown {
    animation-name: slideInDown
}

@keyframes slideInLeft {
    from {
        transform: translate3d(-100%,0,0);
        visibility: visible
    }

    to {
        transform: translate3d(0,0,0)
    }
}

.slideInLeft {
    animation-name: slideInLeft
}

@keyframes slideInRight {
    from {
        transform: translate3d(100%,0,0);
        visibility: visible
    }

    to {
        transform: translate3d(0,0,0)
    }
}

.slideInRight {
    animation-name: slideInRight
}

@keyframes slideInUp {
    from {
        transform: translate3d(0,100%,0);
        visibility: visible
    }

    to {
        transform: translate3d(0,0,0)
    }
}

.slideInUp {
    animation-name: slideInUp
}

.elementor-animation-grow {
    transition-duration: .3s;
    transition-property: transform
}

.elementor-animation-grow:active,.elementor-animation-grow:focus,.elementor-animation-grow:hover {
    transform: scale(1.1)
}

.elementor-animation-shrink {
    transition-duration: .3s;
    transition-property: transform
}

.elementor-animation-shrink:active,.elementor-animation-shrink:focus,.elementor-animation-shrink:hover {
    transform: scale(0.9)
}

@keyframes elementor-animation-pulse {
    25% {
        transform: scale(1.1)
    }

    75% {
        transform: scale(0.9)
    }
}

@keyframes elementor-animation-pulse-grow {
    to {
        transform: scale(1.1)
    }
}



@keyframes elementor-animation-pulse-shrink {
    to {
        transform: scale(0.9)
    }
}



@keyframes elementor-animation-push {
    50% {
        transform: scale(0.8)
    }

    100% {
        transform: scale(1)
    }
}



@keyframes elementor-animation-pop {
    50% {
        transform: scale(1.2)
    }
}

@keyframes elementor-animation-bob {
    0% {
        transform: translateY(-8px)
    }

    50% {
        transform: translateY(-4px)
    }

    100% {
        transform: translateY(-8px)
    }
}

@keyframes elementor-animation-bob-float {
    100% {
        transform: translateY(-8px)
    }
}


@keyframes elementor-animation-hang {
    0% {
        transform: translateY(8px)
    }

    50% {
        transform: translateY(4px)
    }

    100% {
        transform: translateY(8px)
    }
}

@keyframes elementor-animation-hang-sink {
    100% {
        transform: translateY(8px)
    }
}

@keyframes elementor-animation-wobble-vertical {
    16.65% {
        transform: translateY(8px)
    }

    33.3% {
        transform: translateY(-6px)
    }

    49.95% {
        transform: translateY(4px)
    }

    66.6% {
        transform: translateY(-2px)
    }

    83.25% {
        transform: translateY(1px)
    }

    100% {
        transform: translateY(0)
    }
}

@keyframes elementor-animation-wobble-horizontal {
    16.65% {
        transform: translateX(8px)
    }

    33.3% {
        transform: translateX(-6px)
    }

    49.95% {
        transform: translateX(4px)
    }

    66.6% {
        transform: translateX(-2px)
    }

    83.25% {
        transform: translateX(1px)
    }

    100% {
        transform: translateX(0)
    }
}

@keyframes elementor-animation-wobble-to-bottom-right {
    16.65% {
        transform: translate(8px,8px)
    }

    33.3% {
        transform: translate(-6px,-6px)
    }

    49.95% {
        transform: translate(4px,4px)
    }

    66.6% {
        transform: translate(-2px,-2px)
    }

    83.25% {
        transform: translate(1px,1px)
    }

    100% {
        transform: translate(0,0)
    }
}

@keyframes elementor-animation-wobble-to-top-right {
    16.65% {
        transform: translate(8px,-8px)
    }

    33.3% {
        transform: translate(-6px,6px)
    }

    49.95% {
        transform: translate(4px,-4px)
    }

    66.6% {
        transform: translate(-2px,2px)
    }

    83.25% {
        transform: translate(1px,-1px)
    }

    100% {
        transform: translate(0,0)
    }
}

@keyframes elementor-animation-wobble-top {
    16.65% {
        transform: skew(-12deg)
    }

    33.3% {
        transform: skew(10deg)
    }

    49.95% {
        transform: skew(-6deg)
    }

    66.6% {
        transform: skew(4deg)
    }

    83.25% {
        transform: skew(-2deg)
    }

    100% {
        transform: skew(0)
    }
}

@keyframes elementor-animation-wobble-bottom {
    16.65% {
        transform: skew(-12deg)
    }

    33.3% {
        transform: skew(10deg)
    }

    49.95% {
        transform: skew(-6deg)
    }

    66.6% {
        transform: skew(4deg)
    }

    83.25% {
        transform: skew(-2deg)
    }

    100% {
        transform: skew(0)
    }
}

@keyframes elementor-animation-wobble-skew {
    16.65% {
        transform: skew(-12deg)
    }

    33.3% {
        transform: skew(10deg)
    }

    49.95% {
        transform: skew(-6deg)
    }

    66.6% {
        transform: skew(4deg)
    }

    83.25% {
        transform: skew(-2deg)
    }

    100% {
        transform: skew(0)
    }
}

@keyframes elementor-animation-buzz {
    50% {
        transform: translateX(3px) rotate(2deg)
    }

    100% {
        transform: translateX(-3px) rotate(-2deg)
    }
}

@keyframes elementor-animation-buzz-out {
    10% {
        transform: translateX(3px) rotate(2deg)
    }

    20% {
        transform: translateX(-3px) rotate(-2deg)
    }

    30% {
        transform: translateX(3px) rotate(2deg)
    }

    40% {
        transform: translateX(-3px) rotate(-2deg)
    }

    50% {
        transform: translateX(2px) rotate(1deg)
    }

    60% {
        transform: translateX(-2px) rotate(-1deg)
    }

    70% {
        transform: translateX(2px) rotate(1deg)
    }

    80% {
        transform: translateX(-2px) rotate(-1deg)
    }

    90% {
        transform: translateX(1px) rotate(0)
    }

    100% {
        transform: translateX(-1px) rotate(0)
    }
