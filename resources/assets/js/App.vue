<template lang = "pug">
    .component-root.container
        h2.has-text-centered Calendar 2017
        hr
        .columns.is-multiline.is-gapless
            .column.is-one-third.has-text-centered(v-for="(month, i) in months")
                .card
                    .card-header.bg-primary
                        .card-header-title.has-item-centered.text-white {{ month }}
                    .card-content
                        .columns.is-gapless.is-multiline.is-mobile
                            .has-text-centered.date-title(v-for="day in days") {{ day }}
                            .has-text-centered.date(v-for="date in 31" v-if="i == 0")
                                .date-fill(v-if="date > 0") {{ date }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 28+3" v-if="i == 1")
                                .date-fill(v-if="date-3 > 0") {{ date-3 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+3" v-if="i == 2")
                                .date-fill(v-if="date-3 > 0") {{ date-3 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+6" v-if="i == 3")
                                .date-fill(v-if="date-6 > 0") {{ date-6 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+1" v-if="i == 4")
                                .date-fill(v-if="date-1 > 0") {{ date-1 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+4" v-if="i == 5")
                                .date-fill(v-if="date-4 > 0") {{ date-4 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+6" v-if="i == 6")
                                .date-fill(v-if="date-6 > 0") {{ date-6 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+2" v-if="i == 7")
                                .date-fill(v-if="date-2 > 0") {{ date-2 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 8")
                                .date-fill(v-if="date-5 > 0") {{ date-5 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31" v-if="i == 9")
                                .date-fill(v-if="date > 0") {{ date }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+3" v-if="i == 10")
                                .date-fill(v-if="date-3 > 0") {{ date-3 }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+5" v-if="i == 11")
                                .date-fill(v-if="date-5 > 0") {{ date-5 }}
                                .date-empty(v-else) {{ '&nbsp;' }}

</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                months: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'Mei',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                ],
                days: [
                    'Sun',
                    'Mon',
                    'Tue',
                    'Wed',
                    'Thu',
                    'Fri',
                    'Sat'
                ],
                dayCount: 0
            }
        }
    }
</script>

<!-- for styling with stylus -->
<style lang = "stylus" scoped>
    primaryColor = hsl(171, 100%, 41%)
    dangerColor = hsl(348, 100%, 61%)
    warningColor = hsl(48, 100%, 67%)
    infoColor = hsl(217, 71%, 53%)
    successColor = hsl(141, 71%, 48%)
    
    .component-root
        margin 50px auto
    
    .column, h2
        font-weight bold
        
    .card
        min-height 404px
        
    .has-item-centered
        justify-content center
    
    .bg-primary
        background-color primaryColor
    
    .bg-danger
        background-color dangerColor
    
    .bg-danger
        background-color warningColor
    
    .text-white
        color white
    
    .date-5-row
        padding-bottom 4.2rem
    
    .date-title
        padding 10px 0
        width 14.28%
    
    .date
        width 14.28%
    
    .date-fill
        padding 10px 0
        cursor pointer
        &:hover
            background-color infoColor
            color white
    
    .date-empty
        padding 10px 0
        cursor pointer
        background-color gray
        

</style>

<!-- for styling with sass / scss -->
<style lang = "sass">

</style>
