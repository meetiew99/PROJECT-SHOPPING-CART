const images = document.getElementsByClassName ("images");
for (let i = 0; i <= images.length -1 ; i++){
     images[i].addEventListener ("mouseover", ()=>{
          for (let j = 0; j < images.length; j++) {
               images[j].classList.add("passiveimage")
          }
          (function (){
               images[i].classList.remove("passiveimage")    
          })();
     images[i].addEventListener ("mouseout" , ()=>{
          for (let j = 0; j < images.length; j++) {
               images[j].classList.remove("passiveimage")
          }
     })     
})}

