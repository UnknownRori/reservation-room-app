$(() => {
    hideMsgBar();
})

const hideMsgBar = () => {
    setTimeout(() => {
        $("[data-msg]").addClass("hide");
    }, 3000);
}
