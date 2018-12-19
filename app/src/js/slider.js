const keys = {
    sliderContainer: "slider-container",
    sliderContent: "slider-content",
    sliderItem: "slider-item",
    sliderTriggers: "slider-triggers"
}
const animationParams = {
    transition: "1s ease-in-out", // css value
    animationDelay: "5000" // in ms
}

class Slider {
    constructor(element, animationParams) {
        if (!element) {
            throw new Error("No '#slider-container' element");
        }
        if (!element.children || !element.children[keys.sliderTriggers]) {
            throw new Error("No '#slider-triggers' element");
        }
        if (!element.children[keys.sliderContent]) {
            throw new Error("No '#slider-content' element");
        }
        
        if (!animationParams || typeof animationParams !== 'object') {
            throw new Error("animationParams object is not defined");
        }

        if (!animationParams.transition || typeof animationParams.transition !== 'string') {
            throw new Error("animationParams.transition must be a string");
        }
        if (!animationParams.animationDelay || typeof animationParams.animationDelay !== 'string') {
            throw new Error("animationParams.animationDelay must be a string");
        }

        this.container = element;
        
        this.currentItemIndex = 0;
        
        this.content = element.children[keys.sliderContent];
        this._itemsArray = Array.from(this.content.children); //TODO: perhaps rework _computeContent() with it
        
        this.triggers = element.children[keys.sliderTriggers];
        this._triggersArray = Array.from(this.triggers.children);
        
        this.animationParams = animationParams;

        this._computeContent();
        this._computeTriggers();

        this._setAnimationStyle();

        this._translateContent(this.currentItemIndex);

    }

    _computeContent() {
        let contentWidth = this.content.children.length * 100 + "%";
        this.content.style.width = contentWidth;

        for (const item of this.content.children) {
            if (item.className === keys.sliderItem) {
                item.style.width = parseFloat(100 / this.content.children.length) + "%";
            }
        }
    }

    _computeTriggers() {
        for (const trigger of this.triggers.children) {
            trigger.addEventListener("click", (evt) => {
                this._translateContent(this._triggersArray.indexOf(evt.target));
            });
        }
    }

    _setAnimationStyle() {
        this.content.style.transition = this.animationParams.transition;
        this._animationDelay = this.animationParams.animationDelay;
    }

    _translateContent(index) {
        this.currentItemIndex = index;
        
        let translateValue = "-" + index * 100 / this._itemsArray.length + "%";
        this.content.style.transform = `translateX(${translateValue})`;

        this._resetAnimationInterval();
        this._initAnimationInterval();
    }

    _resetAnimationInterval() {
        window.clearInterval(this.animationLoop);
    }

    _initAnimationInterval() {
        this.animationLoop = setInterval(() => {
            if (this.currentItemIndex < this._itemsArray.length - 1) {
                this.currentItemIndex++;
            } else {
                this.currentItemIndex = 0;
            }
            this._translateContent(this.currentItemIndex);
        }, this._animationDelay);
    }
}



document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.getElementById("slider-container");
    if (sliders) {
        const slider = new Slider(sliders, animationParams);
    }

    // for (const index in sliders) { //TODO make it as a loop to use it several times
    //     const slider = new Slider(sliders[index]);
    // }
});