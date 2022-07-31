export default function PostComponent(data){
  let posts = `
  <section class="container-1140">
    <div class="userInfo">
      <figure>
        <img alt="profile image"/>
        <figcaption>${data.username}</figcaption>
      </figure>
    </div>
    <div class="postContainer">
      <p class="fecha">${data.date}</p>
      <div class="postsBody">
        <p class="postTitle">${data.title}</p>
        <div class="postContent">${data.body}</div>
  `;
  if(data.img !== null) posts +="<figure><img alt='post img' src=''/></figure>";
  posts +="</div></div></section>";
  return posts;
}