document.addEventListener('DOMContentLoaded', () => {
    const pros = document.querySelectorAll('.cardProjectCabecera');
    pros.forEach(pro => {
        pro.addEventListener('click', () => {
            console.log("cliccccck");
        });
    });
});