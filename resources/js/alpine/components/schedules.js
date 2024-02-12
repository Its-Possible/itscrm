'use strict'

export default () => ({
    weekday: {
        selected: 1
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
    selectWeekday: function (weekday) {
        this.weekday.selected = weekday;
        console.log(this.weekday.selected);
        debugger;
    },
    selectSchedule: function (timer) {
        this.schedules_select[this.weekday.selected] = timer;
        console.log(this.schedules_select);
    }
});
