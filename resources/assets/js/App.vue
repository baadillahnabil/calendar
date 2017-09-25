<template lang = "pug">
    .component-root.container
        h2.has-text-centered Calendar 2017
        hr
        .field.has-addons
            .control
                .button.is-static.is-hidden-mobile Cari Berdasarkan :
            .control
                span.select
                    select(v-model="selectedSearchBased")
                        option(v-for="option in searchBasedOn", :value="option.value") {{ option.text }}
            .control.is-expanded
                input.input(placeholder='Cari disini, lalu tekan \'Enter\' atau tombol \'Cari\'', v-model.lazy="searchText", @keyup.enter="search")
            .control
                a.button.is-success(@click="search") Cari
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
                                .date-fill(v-if="date > 0 && date <= 31", @click="getData(date, i)", :class="{'date-has-data': dateHasData(date, i)}") {{ date }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 28+7" v-if="i == 1") <!-- February -->
                                .date-fill(v-if="date-3 > 0 && date <= 28+3", @click="getData(date-3, i)", :class="{'date-has-data': dateHasData(date-3, i)}") {{ date-3 }}
                                .date-empty(v-else-if="date >= 28") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 2") <!-- March -->
                                .date-fill(v-if="date-3 > 0 && date <= 31+3", @click="getData(date-3, i)", :class="{'date-has-data': dateHasData(date-3, i)}") {{ date-3 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+12" v-if="i == 3") <!-- April -->
                                .date-fill(v-if="date-6 > 0 && date <= 30+6", @click="getData(date-6, i)", :class="{'date-has-data': dateHasData(date-6, i)}") {{ date-6 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 4") <!-- Mei -->
                                .date-fill(v-if="date-1 > 0 && date <= 31+1", @click="getData(date-1, i)", :class="{'date-has-data': dateHasData(date-1, i)}") {{ date-1 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 5") <!-- June -->
                                .date-fill(v-if="date-4 > 0 && date <= 30+4", @click="getData(date-4, i)", :class="{'date-has-data': dateHasData(date-4, i)}") {{ date-4 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+11" v-if="i == 6") <!-- July -->
                                .date-fill(v-if="date-6 > 0 && date <= 31+6", @click="getData(date-6, i)", :class="{'date-has-data': dateHasData(date-6, i)}") {{ date-6 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 7") <!-- August -->
                                .date-fill(v-if="date-2 > 0 && date <= 31+2", @click="getData(date-2, i)", :class="{'date-has-data': dateHasData(date-2, i)}") {{ date-2 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 8") <!-- September -->
                                .date-fill(v-if="date-5 > 0 && date <= 30+5", @click="getData(date-5, i)", :class="{'date-has-data': dateHasData(date-5, i)}") {{ date-5 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+4" v-if="i == 9") <!-- October -->
                                .date-fill(v-if="date > 0 && date <= 31", @click="getData(date, i)", :class="{'date-has-data': dateHasData(date, i)}") {{ date }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 30+5" v-if="i == 10") <!-- November -->
                                .date-fill(v-if="date-3 > 0 && date <= 30+3", @click="getData(date-3, i)", :class="{'date-has-data': dateHasData(date-3, i)}") {{ date-3 }}
                                .date-empty(v-else-if="date >= 30") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
                            .has-text-centered.date(v-for="date in 31+11" v-if="i == 11") <!-- December -->
                                .date-fill(v-if="date-5 > 0 && date <= 31+5", @click="getData(date-5, i)", :class="{'date-has-data': dateHasData(date-5, i)}") {{ date-5 }}
                                .date-empty(v-else-if="date >= 31") {{ '&nbsp;' }}
                                .date-empty(v-else) {{ '&nbsp;' }}
        
        // Show Lists Data Modal
        b-modal(:active.sync="isDatePopupShowing", has-modal-card=true, :canCancel="canCancel")
            .modal-card
                .modal-card-head.bg-primary.is-radiusless
                    .modal-card-title.has-text-centered.text-white {{ modalTitle }}
                .modal-card-body
                    b-table(:data='isTableEmpty ? [] : eachDayData', :bordered='isTableBordered', :striped='isTableStriped', :narrowed='isTableNarrowed', :loading='isTableLoading', :mobile-cards='hasMobileCards')
                        template(scope='props')
                            b-table-column(label='No', width='40', v-if="showOpsi") {{ props.row.id }}
                            b-table-column(label='Nama') {{ props.row.name }}
                            b-table-column(label='Tahun Kelahiran') {{ props.row.yearBirth }}
                            b-table-column(label='Pada Tanggal', v-if="!showOpsi") {{ props.row.day }} {{ months[props.row.month - 1] }} 2017
                            b-table-column(label='Opsi' v-if="showOpsi")
                                .field.is-grouped
                                    .control
                                        a.button.is-warning.is-small(@click="btnEditClicked(props.row.id, props.row.name, props.row.yearBirth)") Ubah
                                    .control
                                        a.button.is-danger.is-small(@click="deleteData(props.row.id, daySelected, monthSelected)") Hapus
                        template(slot='empty')
                            .content.has-text-grey.has-text-centered {{ noDataText }}
                .modal-card-foot.is-radiusless.is-paddingless(v-if="showOpsi")
                    a.button.is-success.is-full-width(@click="isAddDataPopupShowing = true; isUseForAddData = true;") Tambah Data
        
        // Add or Edit Data Modal
        b-modal(:active.sync="isAddDataPopupShowing", has-modal-card=true, :canCancel="canCancel")
            .modal-card
                .modal-card-body
                    b-field(grouped)
                        b-field(label='Nama', expanded)
                            b-input(v-model.lazy="newName")
                        b-field(label='Tahun Kelahiran', expanded)
                            b-input(type="number", v-model.lazy="newYearBirth")
                .modal-card-foot.is-radiusless.is-paddingless
                    a.button.is-success.is-marginless.is-radiusless.is-full-width(@click="isUseForAddData ? (addData(daySelected, monthSelected)) : (editData(rowIdSelected, daySelected, monthSelected))") {{ isUseForAddData ? 'Tambahkan' : 'Simpan' }}
                    a.button.is-danger.is-marginless.is-radiusless.is-full-width(@click="isAddDataPopupShowing = false") Batal
        
        b-loading(:active.sync="isLoading", :canCancel="canCancelLoading")

</template>

<script>

    export default {
        name: 'app',

        data() {
            const months = ['January', 'February', 'March', 'April', 'Mei', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            const allData = [];
            const eachDayData = [];

            return {
                months,
                days,

                // modal data
                isDatePopupShowing: false,
                canCancel: ['escape', 'x', 'outside'],
                daySelected: '',
                monthSelected: '',

                // Table Data
                allData,
                eachDayData,
                isTableEmpty: false,
                isTableBordered: false,
                isTableStriped: false,
                isTableNarrowed: false,
                isTableLoading: false,
                hasMobileCards: true,
                showOpsi: true,
                rowIdSelected: 0,

                // Modal Add or Edit Data
                isAddDataPopupShowing: false,
                isUseForAddData: true,
                newName: '',
                newYearBirth: '',

                // loading data
                isLoading: false,
                canCancelLoading: false,

                // search
                searchText: '',
                selectedSearchBased: 'name',
                searchBasedOn: [
                    { text: 'Nama', value: 'name' },
                    { text: 'Tahun Kelahiran', value: 'yearBirth' }
                ]
            }
        },

        methods: {

            getAllData() {
                this.allData = [];
                this.isLoading = true;

                axios.get('people/view').then(({ data }) => {

                        let rowIndex = 1;
                        for (let i = 0; i < data.length; i++) {
                            for (let j = 0; j < data[i][1].length; j++) {
                                let dataExplode = data[i][1][j].split('|');
                                let dateExplode = data[i][0].split('-');
                                let people = {
                                    id: rowIndex++,
                                    name: dataExplode[0],
                                    yearBirth: dataExplode[1],
                                    day: dateExplode[0],
                                    month: dateExplode[1]
                                };
                                this.allData.push(people);
                            }
                        }
                        this.isLoading = false;
                    }
                ).catch((err) => {
                    this.isLoading = false;
                    console.error(err);
                });
            },

            dateHasData(day, month) {
                for (let i = 0; i < this.allData.length; i++) {
                    if (this.allData[i].day === day.toString() && this.allData[i].month === (month + 1).toString()) {
                        return true;
                    }
                }
            },

            getData(day, month) {
                this.daySelected = day;
                this.monthSelected = month;

                this.eachDayData = [];

                let rowIndex = 1;
                for (let i = 0; i < this.allData.length; i++) {
                    if (this.allData[i].day === day.toString() && this.allData[i].month === (month + 1).toString()) {
                        let data = {
                            id: rowIndex++,
                            name: this.allData[i].name,
                            yearBirth: this.allData[i].yearBirth,
                            day: this.allData[i].day,
                            month: this.allData[i].month
                        };
                        this.eachDayData.push(data);
                    }
                }
                this.showOpsi = true;
                this.isDatePopupShowing = true;
            },

            addData(day, month) {
                this.isLoading = true;

                axios.post('people/add', {
                    day,
                    month: month + 1,
                    name: this.newName,
                    yearBirth: this.newYearBirth
                }).then(() => {
                    this.getAllData();
                    this.isAddDataPopupShowing = false;
                    this.isDatePopupShowing = false;

                    this.isLoading = false;
                    this.toast('Data berhasil di tambahkan');
                }).catch((err) => {
                    this.isLoading = false;
                    console.error(err);
                });
            },

            btnEditClicked(id, currentName, currentYearBirth) {
                this.isAddDataPopupShowing = true;
                this.isUseForAddData = false;
                this.rowIdSelected = id;
                this.newName = currentName;
                this.newYearBirth = currentYearBirth;
            },

            editData(rowId, day, month) {
                this.isLoading = true;

                axios.post('people/edit', {
                    rowId,
                    day,
                    month: month + 1,
                    name: this.newName,
                    yearBirth: this.newYearBirth
                }).then(() => {
                    this.getAllData();
                    this.isAddDataPopupShowing = false;
                    this.isDatePopupShowing = false;

                    this.isLoading = false;
                    this.toast('Data berhasil di ubah');
                }).catch((err) => {
                    this.isLoading = false;
                    console.error(err);
                });
            },

            deleteData(rowId, day, month) {
                this.isLoading = true;

                axios.post('people/delete', {
                    rowId,
                    day,
                    month: month + 1
                }).then(() => {
                    this.getAllData();
                    this.isAddDataPopupShowing = false;
                    this.isDatePopupShowing = false;

                    this.isLoading = false;
                    this.toast('Data berhasil di hapus');
                }).catch((err) => {
                    this.isLoading = false;
                    console.error(err);
                });
            },

            search() {
                this.showOpsi = false;
                this.isDatePopupShowing = true;

                this.eachDayData = this.searchedData;
            },

            // snackbar
            snackbar(message, type, position) {
                this.$snackbar.open({
                    message: message,
                    type: type,
                    position: position
                })
            },

            // toast
            toast(message) {
                this.$toast.open(message);
            },

        },

        computed: {
            modalTitle() {
                if (!this.showOpsi) {
                    if (this.selectedSearchBased == 'name') return `Nama : '${this.searchText}'`;
                    else return `Tahun Kelahiran : '${this.searchText}'`;
                }
                else return `${this.daySelected} ${this.months[this.monthSelected]} 2017`;
            },

            noDataText() {
                if (this.showOpsi) return 'Tidak Ada Data Pada Tanggal Ini';
                else return 'Tidak Ada Data Pada Pencarian Ini';
            },

            searchedData() {
                return this.allData.filter((data) => {
                    if (this.selectedSearchBased == 'name') return data.name.toLowerCase().indexOf(this.searchText.toLowerCase()) >= 0;
                    else return data.yearBirth.toLowerCase().indexOf(this.searchText.toLowerCase()) >= 0;
                });
            }
        },

        watch: {
            isAddDataPopupShowing(value) {
                if (value) {
                    // this.$refs.inputNewName.focus();
                } else {
                    this.isAddDataPopupShowing = false;
                    this.newName = '';
                    this.newYearBirth = '';
                }
            }
        },

        mounted() {
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
        
        .date-has-data
            background-color danger
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
