function lstLaunchStory(id, label, productId) {
    const modal = document.getElementById("storyModal");
    const player = document.getElementById("storyPlayer");
    if (modal && player) {
        player.src = "https://www.youtube.com/embed/" + id + "?autoplay=1&mute=0&rel=0&controls=0&modestbranding=1&showinfo=0&iv_load_policy=3&playsinline=1&disablekb=1&vq=hd1080";
        modal.style.setProperty("display", "flex", "important");
        document.body.style.overflow = "hidden";
    }
}

function lstCloseStoryModal() {
    const modal = document.getElementById("storyModal");
    const player = document.getElementById("storyPlayer");
    if (modal && player) {
        modal.style.setProperty("display", "none", "important");
        player.src = "";
        document.body.style.overflow = "auto";
    }
}
