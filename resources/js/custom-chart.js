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
              {
                x: 'PT PJB',
                y:
                  data.data.jumlah_karyawan.pjb.laki_laki +
                  data.data.jumlah_karyawan.pjb.perempuan,
              },
              {
                x: 'PT PJBS',
                y:
                  data.data.jumlah_karyawan.pjbs.laki_laki +
                  data.data.jumlah_karyawan.pjbs.perempuan,
              },
              {
                x: 'PT TAD',
                y:
                  data.data.jumlah_karyawan.tad.laki_laki +
                  data.data.jumlah_karyawan.tad.perempuan,
              },
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
              text: 'Karyawan',
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

  if ($('#chart-jumlah-karyawan-bygender').length) {
    let ctx = $('#chart-jumlah-karyawan-bygender')[0].getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['PT PJB', 'PT PJBS', 'PT TAD'],
        datasets: [
          {
            label: 'Laki-laki',
            data: [
              data.data.jumlah_karyawan.pjb.laki_laki,
              data.data.jumlah_karyawan.pjbs.laki_laki,
              data.data.jumlah_karyawan.tad.laki_laki,
            ],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
          },
          {
            label: 'Perempuan',
            data: [
              data.data.jumlah_karyawan.pjb.perempuan,
              data.data.jumlah_karyawan.pjbs.perempuan,
              data.data.jumlah_karyawan.tad.perempuan,
            ],
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgb(255, 159, 64)',
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
              text: 'Jenis Kelamin',
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

  if ($('#chart-data-usia').length) {
    let ctx = $('#chart-data-usia')[0].getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['<20', '20-29', '30-39', '40-49', '>50'],
        datasets: [
          {
            label: 'PT PJB',
            data: [
              data.data.usia.pjb.level1,
              data.data.usia.pjb.level2,
              data.data.usia.pjb.level3,
              data.data.usia.pjb.level4,
              data.data.usia.pjb.level5,
            ],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
          },
          {
            label: 'PT PJBS',
            data: [
              data.data.usia.pjbs.level1,
              data.data.usia.pjbs.level2,
              data.data.usia.pjbs.level3,
              data.data.usia.pjbs.level4,
              data.data.usia.pjbs.level5,
            ],
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgb(255, 159, 64)',
            borderWidth: 1,
          },
          {
            label: 'PT TAD',
            data: [
              data.data.usia.tad.level1,
              data.data.usia.tad.level2,
              data.data.usia.tad.level3,
              data.data.usia.tad.level4,
              data.data.usia.tad.level5,
            ],
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            borderColor: 'rgb(255, 205, 86)',
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
              text: 'Usia',
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
        labels: ['SMA/SMK/MA', 'D3', 'S1', 'S2'],
        datasets: [
          {
            data: [
              data.data.pendidikan.SMU,
              data.data.pendidikan.D3,
              data.data.pendidikan.S1,
              data.data.pendidikan.S2,
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            hoverBackgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
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
              text: 'Pendidikan',
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
