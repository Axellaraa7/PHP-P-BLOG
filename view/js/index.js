import { getPost, formPost } from "./modules/ajax.js";

let posts = 4;
let offset = 0;

const d = document,
url = "http://php-projects.localhost/1.API-REST-SPA-BLOG2/API/";
// let urlOffset = "http://php-projects.localhost/1.API-REST-SPA-BLOG2/API/?posts="+posts+"&offset="+offset;
let urlOffset = "?posts="+posts+"&offset="+offset;

d.addEventListener("DOMContentLoaded",inicio,false);

function inicio(){
  switch (location.pathname){
    case "/":
    case "/home":
      getPost(url+urlOffset);
      d.addEventListener("submit",(e) =>{
        e.preventDefault();
        if(e.target.matches("#formPost")){
          const formData = new FormData(e.target);
          formPost(url,formData);
          getPost(url+urlOffset);
        }
      },false);
      d.addEventListener("change", (e) =>{
        if(e.target.matches("#imgPost")){
          const label = d.querySelector(".fileImgButton>div>label");
          label.textContent = e.target.files[0].name;
          // label.classList.remove("fa-solid","fa-image");
          label.style.fontSize = "1.6rem";
        }
      },false);
      d.addEventListener("scroll",()=>{
        let {scrollTop,clientHeight,scrollHeight} = d.documentElement;
        if(scrollTop+clientHeight >= scrollHeight){
          offset++;
          urlOffset = "?posts="+posts+"&offset="+offset;
          console.log(urlOffset);
          getPost(url+urlOffset);
        }
      });
      break;
  }
}

