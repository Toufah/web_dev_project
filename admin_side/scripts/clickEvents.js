// click event for side bar
const arrow = document.getElementById("arrow");
const sidebar = document.getElementById("side");
let state = false;

if (arrow) {
  arrow.addEventListener("click", function () {
    if (sidebar) {
      if (!state) {
        sidebar.classList.add("active");
        arrow.classList.add("rotate");
        state = !state;
      } else if (state) {
        sidebar.classList.remove("active");
        arrow.classList.remove("rotate");
        state = !state;
      }
    }
  });
}

// click event for side bar link
const activePage = window.location.pathname;
const navlinks = document.querySelectorAll("#side a");

navlinks.forEach(link => {
  if(link.href.split('/').pop() == activePage.split("/").pop()){
    link.querySelector('li').classList.add("ch_col_on_click");
  };
})

//add user event
const addUser = document.getElementById("add_user");
const btn = document.getElementById("addUs");
const xmark = document.getElementById("xmark");

btn.addEventListener("click", function(){
  addUser.classList.remove("close");
});

xmark.addEventListener("click", () => {
  addUser.classList.add("close");
})


//remove user event
// const box = document.querySelectorAll('.user');
// box.forEach(checkbox => {
//   checkbox.addEventListener("change", function(){
//     if(checkbox.checked){
//       console.log("checked box");
//     }else{
//       console.log("unchecked box");
//     }
//   })
// });