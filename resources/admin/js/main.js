$(function () {
    $('#barchart-PBI-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Philippine Batteries, Inc.'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [3, 5, 4, 1, 3, 3, 6, 2, 7, 8, 2, 5, 2, 6, 2]
        }, {
            name: 'Inactive',
            data: [2, 7, 5, 3, 5, 6, 6, 2, 8, 2, 5, 1, 5, 3, 5]
        }]
    });
});

$(function () {
    $('#barchart-STAM-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'STAM'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [3, 5, 4, 1, 3, 3, 6, 2, 7, 8, 2, 5, 2, 6, 2]
        }, {
            name: 'Inactive',
            data: [2, 7, 5, 3, 5, 6, 6, 2, 8, 2, 5, 1, 5, 3, 5]
        }]
    });
});

$(function () {
    $('#barchart-ALL-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'ALL'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [3, 5, 4, 1, 3, 3, 6, 2, 7, 8, 2, 5, 2, 6, 2]
        }, {
            name: 'Inactive',
            data: [2, 7, 5, 3, 5, 6, 6, 2, 8, 2, 5, 1, 5, 3, 5]
        }]
    });
});

$(function () {
    $('#barchart-PBI-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [18, 47, 37, 60, 63, 35, 25, 31,36, 56, 35, 56, 26, 31, 16]
        }, {
            name: 'Service Unit',
            data: [23, 11, 30, 32, 43, 73, 74, 27, 64, 64, 83, 91, 92, 61, 73]
        }, {
            name: 'For Repair',
            data: [32, 43, 47, 49, 32, 58, 75, 37, 65, 82, 52, 46, 21, 53, 42]
        }, {
            name: 'Unknown',
            data: [23, 42, 45, 24, 54, 27, 85, 35, 63, 76, 53, 76, 43, 43, 74]
        }]
    });
});


$(function () {
    $('#barchart-STAM-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [18, 47, 37, 60, 63, 35, 25, 31,36, 56, 35, 56, 26, 31, 16]
        }, {
            name: 'Service Unit',
            data: [23, 11, 30, 32, 43, 73, 74, 27, 64, 64, 83, 91, 92, 61, 73]
        }, {
            name: 'For Repair',
            data: [32, 43, 47, 49, 32, 58, 75, 37, 65, 82, 52, 46, 21, 53, 42]
        }, {
            name: 'Unknown',
            data: [23, 42, 45, 24, 54, 27, 85, 35, 63, 76, 53, 76, 43, 43, 74]
        }]
    });
});

$(function () {
    $('#barchart-ALL-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [18, 47, 37, 60, 63, 35, 25, 31,36, 56, 35, 56, 26, 31, 16]
        }, {
            name: 'Service Unit',
            data: [23, 11, 30, 32, 43, 73, 74, 27, 64, 64, 83, 91, 93, 61, 73]
        }, {
            name: 'For Repair',
            data: [32, 43, 47, 49, 32, 58, 75, 37, 65, 82, 52, 46, 21, 53, 43]
        }, {
            name: 'Unknown',
            data: [23, 42, 45, 24, 54, 27, 85, 35, 63, 76, 53, 76, 43, 43, 74]
        }]
    });
});