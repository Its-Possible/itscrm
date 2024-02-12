'use strict'

export default () => ({
    weekday: {
        selected: 0
    },
    schedules_select: {
        1: [],
        2: [],
        3: [],
        4: [],
        5: [],
        6: [],
        7: []
    },
    selectWeekdayEventHandler: function (weekday) {
        this.weekday.selected = weekday;
    },
    selectScheduleEventHandler: function (timer) {
        let schedule_selected_per_weekday = this.schedules_select[this.weekday.selected];
        if(!schedule_selected_per_weekday.includes(timer)) {
            schedule_selected_per_weekday.push(timer);
            console.log("A timer was added to the schedules array");
            return false;
        }else{
            console.log("A timer was removed to the schedules array");
        }
    }
});
