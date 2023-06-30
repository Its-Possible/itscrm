export default () => ({
    salut () {
        let time = new Date();

        if(time.getHours() >= 12 && time.getHours() < 19){
            return "Good afternoon"
        }else if(time.getHours() >= 19 && time.getHours() < 0){
            return "Good night"
        }else{
            return "Good morning";
        }
    }
});
