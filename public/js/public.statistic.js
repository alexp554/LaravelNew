// API_URL get FROM layouts/public/layout.blade.php

const DAILY = "daily";
const MONTHLY = "monthly";

const app = new Vue({
    el: '#App',
    data: function() {
        return {
            activeBox: {
                member: DAILY,
                event: DAILY,
                visitor: DAILY,
            },
            activeSection: "member",
            chartObj: null,
            rawData: initChartData
        }
    },
    computed: {
    },
    mounted() {
        this.setChartObj();
        this.initChart();
    },
    methods: {
        setActiveSection: function(section) {
            this.activeSection = section;
            const timeout = 100;
            const self = this;

            setTimeout(function() {
                switch(section){
                    case "member":
                        self.refreshChart().memberDaily();
                        self.refreshChart().memberMonthly();
                        break;
                    case "event":
                        self.refreshChart().eventDaily();
                        self.refreshChart().eventMonthly();
                        break;
                    case "visitor":
                        self.refreshChart().visitorDaily();
                        self.refreshChart().visitorMonthly();
                        break;
                    default:
                        break;
                }
            }, timeout);
        },
        setChartObj: function() {
            const self = this;
            this.chartObj = {
                // Member Daily
                memberDaily: Morris.Line({
                    element: 'MemberGrowthDaily',
                    data: [],
                    xkey: 'x',
                    ykeys: 'y',
                    labels: ['Member Count'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return self.customHoverTooltip(index, options, content);
                    },
                }),

                // Member Monthly
                memberMonthly: Morris.Line({
                    element: 'MemberGrowthMonthly',
                    data: [],
                    xkey: 'x',
                    ykeys: 'y',
                    labels: ['Member Count'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return self.customHoverTooltip(index, options, content);
                    },
                }),

                // Event Daily
                eventDaily: Morris.Line({
                    element: 'EventGrowthDaily',
                    data: [],
                    xkey: 'x',
                    ykeys: ['y', 'y_audiences'],
                    labels: ['Event Count', 'Total Participant'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return "<div>"
                                + "<div class='morris-hover-row-label'> " + options.data[index].x_format + "</div>"
                                    + "<div class='morris-hover-point'>"
                                        + options.labels[1] + ": " + options.data[index].y_audiences
                                        + "<br />"
                                        + options.labels[0] + ": " + options.data[index].y
                                    + "</div>"
                                + "</div>";
                    },
                }),

                // Event Monthly
                eventMonthly: Morris.Line({
                    element: 'EventGrowthMonthly',
                    data: [],
                    xkey: 'x',
                    ykeys: ['y', 'y_audiences'],
                    labels: ['Event Count', 'Total Participant'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return "<div>"
                                + "<div class='morris-hover-row-label'> " + options.data[index].x_format + "</div>"
                                    + "<div class='morris-hover-point'>"
                                        + options.labels[1] + ": " + options.data[index].y_audiences
                                        + "<br />"
                                        + options.labels[0] + ": " + options.data[index].y
                                    + "</div>"
                                + "</div>";
                    },
                }),

                // Visitor Daily
                visitorDaily: Morris.Line({
                    element: 'VisitorGrowthDaily',
                    data: [],
                    xkey: 'x',
                    ykeys: 'y',
                    labels: ['Visitor'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return self.customHoverTooltip(index, options, content);
                    },
                }),

                // Visitor Monthly
                visitorMonthly: Morris.Line({
                    element: 'VisitorGrowthMonthly',
                    data: [],
                    xkey: 'x',
                    ykeys: 'y',
                    labels: ['Visitor'],
                    barColors: ['#0283cc'],
                    hideHover: 'auto',
                    gridLineColor: '#e0e0e0',
                    resize: true,
                    redraw: true,
                    hoverCallback: function(index, options, content) {
                        return self.customHoverTooltip(index, options, content);
                    },
                }),
            }
        },
        customHoverTooltip: function(index, options, content) {
            return "<div>"
                    + "<div class='morris-hover-row-label'> " + options.data[index].x_format + "</div>"
                        + "<div class='morris-hover-point'>"
                            + options.labels[0] + ": " + options.data[index].y
                        + "</div>"
                    + "</div>";
        },
        initChart: function() {
            // member
            this.refreshChart().memberDaily();
            this.refreshChart().memberMonthly();

            // event
            this.refreshChart().eventDaily();
            this.refreshChart().eventMonthly();

            // visitor
            this.refreshChart().visitorDaily();
            this.refreshChart().visitorMonthly();
        },
        refreshChart: function() {
            // initChartData get from statistic.blade.php
            const self = this;
            return {
                // member
                memberDaily: function() {
                    self.chartObj.memberDaily.setData(initChartData.memberDaily)
                    self.chartObj.memberDaily.resizeHandler();
                },
                memberMonthly: function() {
                    self.chartObj.memberMonthly.setData(initChartData.memberMonthly)
                    self.chartObj.memberMonthly.resizeHandler();
                },

                // event
                eventDaily: function() {
                    self.chartObj.eventDaily.setData(initChartData.eventDaily)
                    self.chartObj.eventDaily.resizeHandler();
                },
                eventMonthly: function() {
                    self.chartObj.eventMonthly.setData(initChartData.eventMonthly)
                    self.chartObj.eventMonthly.resizeHandler();
                },

                // visitor
                visitorDaily: function() {
                    self.chartObj.visitorDaily.setData(initChartData.visitorDaily)
                    self.chartObj.visitorDaily.resizeHandler();
                },
                visitorMonthly: function() {
                    self.chartObj.visitorMonthly.setData(initChartData.visitorMonthly)
                    self.chartObj.visitorMonthly.resizeHandler();
                },
            }
        },
        setActiveBox: function() {
            const self = this;
            const timeout = 100;
            return {
                member: function(kind) {
                    self.activeBox.member = kind;
                    setTimeout(function() {
                        kind == DAILY ? self.refreshChart().memberDaily() : self.refreshChart().memberMonthly();
                    }, timeout);
                },
                event: function(kind) {
                    self.activeBox.event = kind;
                    setTimeout(function() {
                        kind == DAILY ? self.refreshChart().eventDaily() : self.refreshChart().eventMonthly();
                    }, timeout);
                },
                visitor: function(kind) {
                    self.activeBox.visitor = kind;
                    setTimeout(function() {
                        kind == DAILY ? self.refreshChart().visitorDaily() : self.refreshChart().visitorMonthly();
                    }, timeout);
                },
            }
        }
    }
});
