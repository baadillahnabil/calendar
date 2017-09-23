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
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 0") <!-- January -->
                                .date-fill(v-if="date > 0 && date <= 31", @click="showDatePopup(date, i)") {{ date }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 28+7" v-if="i == 1") <!-- February -->
                                .date-fill(v-if="date-3 > 0 && date <= 28+3", @click="showDatePopup(date-3, i)") {{ date-3 }}
                                .date-empty(v-else-if="date >= 28") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 2") <!-- March -->
                                .date-fill(v-if="date-3 > 0 && date <= 31+3", @click="showDatePopup(date-3, i)") {{ date-3 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+12" v-if="i == 3") <!-- April -->
                                .date-fill(v-if="date-6 > 0 && date <= 30+6", @click="showDatePopup(date-6, i)") {{ date-6 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 4") <!-- Mei -->
                                .date-fill(v-if="date-1 > 0 && date <= 31+1", @click="showDatePopup(date-1, i)") {{ date-1 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 5") <!-- June -->
                                .date-fill(v-if="date-4 > 0 && date <= 30+4", @click="showDatePopup(date-4, i)") {{ date-4 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+11" v-if="i == 6") <!-- July -->
                                .date-fill(v-if="date-6 > 0 && date <= 31+6", @click="showDatePopup(date-6, i)") {{ date-6 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 7") <!-- August -->
                                .date-fill(v-if="date-2 > 0 && date <= 31+2", @click="showDatePopup(date-2, i)") {{ date-2 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 8") <!-- September -->
                                .date-fill(v-if="date-5 > 0 && date <= 30+5", @click="showDatePopup(date-5, i)") {{ date-5 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 9") <!-- October -->
                                .date-fill(v-if="date > 0 && date <= 31", @click="showDatePopup(date, i)") {{ date }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 10") <!-- November -->
                                .date-fill(v-if="date-3 > 0 && date <= 30+3", @click="showDatePopup(date-3, i)") {{ date-3 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+11" v-if="i == 11") <!-- December -->
                                .date-fill(v-if="date-5 > 0 && date <= 31+5", @click="showDatePopup(date-5, i)") {{ date-5 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
        
        // Popup Date
        b-modal(:active.sync="isDatePopupShowing", has-modal-card=true, :canCancel="canCancel")
            .modal-card
                .modal-card-head.bg-primary.is-radiusless
                    .modal-card-title.has-text-centered.text-white {{ daySelected }} {{ months[monthSelected] }} 2017
                .modal-card-body
                    b-table(:data='isEmpty ? [] : allData', :bordered='isBordered', :striped='isStriped', :narrowed='isNarrowed', :loading='isLoading', :mobile-cards='hasMobileCards')
                        template(scope='props')
                            b-table-column(label='No', width='40') {{ props.row.id }}
                            b-table-column(label='Nama') {{ props.row.name }}
                            b-table-column(label='Tahun Kelahiran') {{ props.row.yearBirth }}
                            b-table-column(label='Opsi')
                                .field.is-grouped
                                    .control
                                        a.button.is-warning.is-small Ubah
                                    .control
                                        a.button.is-danger.is-small Hapus
                        template(slot='empty')
                            .content.has-text-grey.has-text-centered Tidak Ada Data Pada Tanggal Ini


</template>

<script>
    export default {
        name: 'app',
        data() {
            const allData = [];
            const popupData = [];

            return {
                months: ['January', 'February', 'March', 'April', 'Mei', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                // modal data
                isDatePopupShowing: false,
                canCancel: ['escape', 'x', 'outside'],
                daySelected: '',
                monthSelected: '',

                // Table Data
                allData,
                isEmpty: false,
                isBordered: false,
                isStriped: false,
                isNarrowed: false,
                isLoading: false,
                hasMobileCards: true
            }
        },
        methods: {
            showDatePopup(day, month) {
                this.daySelected = day;
                this.monthSelected = month;
                this.isDatePopupShowing = true;
            },
            getAllData() {
                axios.get('people/view').then(({ data }) => {

                        let rowIndex = 1;
                        for (let i = 0; i < data.length; i++) {
                            for (let j = 0; j < data[i][1].length; j++) {
                                console.log(data[i][1][j]);
                                let dataExplode = data[i][1][j].split('|');
                                let people = {
                                    id: rowIndex++,
                                    name: dataExplode[0],
                                    yearBirth: dataExplode[1],
                                };
                                this.allData.push(people);
                            }
                        }
                        
                    }
                ).catch((err) => console.error(err));
            }
        },
        created() {
            this.getAllData();
        }
    }
</script>

<!-- for styling with stylus -->
<style lang = "stylus" scoped>
    @import "../stylus/color.styl"
    @import "../stylus/helper.styl"
    
    .component-root
        margin 50px auto
    
    .column, h2
        font-weight bold
    
    .card
        min-height 418px
        .card-content
            padding 0
            margin 1.5rem
            border 1px solid
    
    .date-5-row
        padding-bottom 4.2rem
    
    .date-title
        padding 10px 0
        width 14.28%
        border 1px solid
    
    .date
        width 14.28%
        border 1px solid
        
        .date-fill
            padding 10px 0
            cursor pointer
            &:hover
                background-color info
                color white
        
        .date-empty
            padding 10px 0
            cursor no-drop
            background-color lightGrey
    
    .modal
        padding 10px
        
        .modal-card-head
            padding 10px 0
        
        .modal-card-body
            .column
                border-bottom 1px solid lightGrey
                border-top 1px solid lightGrey

</style>

<!-- for styling with sass / scss -->
<style lang = "sass">

</style>
