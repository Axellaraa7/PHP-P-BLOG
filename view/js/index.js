import { getPost, formPost } from "./modules/ajax.js";
import { appendChild } from "./modules/appendChild.js";

let posts = 4;
let offset = 0;

const d = document,
url = "http://php-projects.localhost/1.API-REST-SPA-BLOG/API/";
let urlOffset = "?posts="+posts+"&offset="+offset;

function inicio(){
  const lines = d.querySelectorAll(".menuLine"),
  navHeader = d.getElementById("navHeader");
  if(window.innerWidth <= 960) navHeader.classList.add("fadeOut");
  d.addEventListener("click",(e) => {
    if(e.target.matches(".hbgMenu-4") || e.target.matches(".hbgMenu-4 > *")){
      lines[0].classList.toggle("line1");
      lines[1].classList.toggle("line2");
      lines[2].classList.toggle("line3");
      lines[3].classList.toggle("line4");
      navHeader.classList.toggle("fadeOut");
    }
  });
  window.addEventListener("resize",() => {
    if(window.innerWidth <= 960){
      navHeader.classList.add("fadeOut");
      lines[0].classList.remove("line1");
      lines[1].classList.remove("line2");
      lines[2].classList.remove("line3");
      lines[3].classList.remove("line4");
    }else{
      navHeader.classList.remove("fadeOut");
      lines[0].classList.add("line1");
      lines[1].classList.add("line2");
      lines[2].classList.add("line3");
      lines[3].classList.add("line4");
    }
  });
  switch (location.pathname){
    case "/":
    case "/home":
      getPost(url+urlOffset,(fragment)=>{d.getElementById("bloggie-main").appendChild(fragment)});
      d.addEventListener("submit",(e) =>{
        e.preventDefault();
        if(e.target.matches("#formPost")){
          const formData = new FormData(e.target);
          formPost(url,formData);
          getPost(url+"?posts=1&offset=0",(fragment)=>{
            for(const element of fragment.children){
            d.getElementById("bloggie-main").insertAdjacentElement("afterbegin",element)};
          });
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
        if(scrollTop+clientHeight >= scrollHeight - 1){
          offset++;
          urlOffset = "?posts="+posts+"&offset="+offset;
          console.log(urlOffset);
          getPost(url+urlOffset,(fragment)=>{d.getElementById("bloggie-main").appendChild(fragment)});
        }
      });
      break;
  }
}

d.addEventListener("DOMContentLoaded",inicio,false);