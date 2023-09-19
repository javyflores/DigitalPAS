(function(){
    
    const sliders = [...document.querySelectorAll('.Presenta__body')];
    const buttonNext = document.querySelector('#next');
    const buttonBefore = document.querySelector('#before');
    let value;   

    buttonNext.addEventListener('click', ()=>{
        changePosition(1);
    });

    buttonBefore.addEventListener('click', ()=>{
        changePosition(-1);
    });

    const changePosition = (add)=>{
        const currentPresenta = document.querySelector('.Presenta__body--show').dataset.id;
        value = Number(currentPresenta);
        value+= add;


        sliders[Number(currentPresenta)-1].classList.remove('Presenta__body--show');
        if(value === sliders.length+1 || value === 0){
            value = value === 0 ? sliders.length  : 1;
        }

        sliders[value-1].classList.add('Presenta__body--show');

    }

})();