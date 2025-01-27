const sidebar = document.getElementById("sidebarMenu");
const header = document.getElementById("adminHeader");
const adminLayout = document.getElementById("adminLayout");
const headerButton = header.getElementsByClassName("navbar-brand")[0];

headerButton.addEventListener("click", () => {
    sidebar.classList.toggle("active");
    const contentSidebar = sidebar
        .getElementsByClassName("sidebar")[0]
        .getElementsByTagName("div")[0];

    if (sidebar.classList.contains("active")) {
        adminLayout.getElementsByTagName("main")[0].style = "padding-left: 0px";
        sidebar.getElementsByClassName("sidebar")[0].style = "width: 0px";
        contentSidebar.classList.add("d-none");
    } else {
        adminLayout.getElementsByTagName("main")[0].style =
            "padding-left: 240px";
        sidebar.getElementsByClassName("sidebar")[0].style = "width: 240px";
        contentSidebar.classList.remove("d-none");
    }
});
