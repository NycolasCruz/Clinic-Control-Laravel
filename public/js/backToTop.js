const btnToTop = document.querySelector('#back-to-top')
const hiddenBtn = btnToTop.classList

btnToTop.addEventListener('click', function(){
    window.scrollTo(0, 0)
})
addEventListener('scroll', function(){
    let height = document.documentElement.scrollTop
    if(height > 650){
        hiddenBtn.remove('hidden')
    }else if(height < 550){
        hiddenBtn.add('hidden')
    }
})
