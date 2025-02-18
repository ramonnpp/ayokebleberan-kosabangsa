document.addEventListener("DOMContentLoaded", () => {
    const cardContainers = document.querySelectorAll(".card-container");

    cardContainers.forEach(container => {
        const description = container.querySelector(".card-description");
        const seeMoreButton = container.querySelector(".see-more");

        if (description.scrollHeight > description.clientHeight) {
            seeMoreButton.style.display = "inline";
        }

        seeMoreButton.addEventListener("click", () => {
           
            cardContainers.forEach(otherContainer => {
                if (otherContainer !== container && otherContainer.classList.contains("expanded")) {
                    const otherDescription = otherContainer.querySelector(".card-description");
                    const otherButton = otherContainer.querySelector(".see-more");
                    otherContainer.classList.remove("expanded");
                    otherButton.innerText = "See More";
                    otherDescription.style.maxHeight = "36px"; 
                }
            });

            
            container.classList.toggle("expanded");

            if (container.classList.contains("expanded")) {
                seeMoreButton.innerText = "See Less";
                description.style.maxHeight = `${description.scrollHeight}px`;
            } else {
                seeMoreButton.innerText = "See More";
                description.style.maxHeight = "36px"; 
            }
        });
    });
});