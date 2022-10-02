import helper from './helper';
import colors from './colors';
import Chart from 'chart.js/auto';

(async function () {
  'use strict';

  function getHostUrl() {
    const protocol = location.protocol;
    const slashes = protocol.concat('//');
    const host = slashes.concat(window.location.hostname);
    const port = location.port;
    return host + ':' + port;
  }

  async function getData() {
    try {
      const uri = getHostUrl() + '/data/charts';
      const res = await fetch(uri);
      const data = res.json();
      return data;
    } catch (error) {
      console.error(error.message);
    }
  }

  const data = await getData();

  if ($('#chart-jumlah-karyawan').length) {
    let ctx = $('#chart-jumlah-karyawan')[0].getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        datasets: [
          {
            label: 'Data',
            data: [
              { x: 'PT PJB', y: data.pjb },
              { x: 'PT PJBS', y: data.pjbs },
              { x: 'PT TAD', y: data.tad },
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate['500'](0.8),
            },
            title: {
              display: true,
              text: 'Tipe Karyawan',
              position: 'center',
              font: {
                size: 16,
                weight: 'bold',
              },
            },
          },
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: 12,
              },
              color: colors.slate['500'](0.8),
            },
            grid: {
              display: false,
              drawBorder: false,
            },
          },
          y: {
            ticks: {
              font: {
                size: '12',
              },
              color: colors.slate['500'](0.8),
            },
            grid: {
              color: $('html').hasClass('dark')
                ? colors.slate['500'](0.3)
                : colors.slate['300'](),
              borderDash: [2, 2],
              drawBorder: false,
            },
          },
        },
      },
    });
  }

  if ($('#chart-data-pendidikan').length) {
    let ctx = $('#chart-data-pendidikan')[0].getContext('2d');
    let myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['SMA/SMK/MA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
        datasets: [
          {
            data: [
              data.sma + data.smk + data.ma,
              data.d1,
              data.d2,
              data.d3,
              data.s1,
              data.s2,
              data.s3,
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)',
            ],
            hoverBackgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)',
            ],
            borderWidth: 5,
            borderColor: $('html').hasClass('dark')
              ? colors.darkmode[700]()
              : colors.white,
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate['500'](0.8),
            },
            title: {
              display: true,
              text: 'Pendidikan Karyawan',
              position: 'center',
              font: {
                size: 16,
                weight: 'bold',
              },
            },
          },
        },
      },
    });
  }
})();
