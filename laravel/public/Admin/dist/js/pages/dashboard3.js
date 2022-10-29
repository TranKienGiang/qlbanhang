/* global Chart:false */

$(function () {
  let listday = $("#container-day").attr("data-list-day");
  listday = JSON.parse(listday);
  let listmoney = $("#container-day").attr("data-list-money");
  listmoney = JSON.parse(listmoney);
  let listorder = $("#container-day").attr("data-list-order");
  listorder = JSON.parse(listorder);
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: listday,
          datasets: [{
            label: 'Tổng tiền',
            data: listmoney,
            fill: false,
            borderColor: 'rgb(255, 205, 86)',
            tension: 0.1
          },
          {
            type: 'line',
            label: 'Tổng số đơn',
            data: listorder,
            fill: false,
            borderColor: 'rgb(77, 136, 255)',
        }],
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
})

$(function () {
  let listmonth = $("#container-day").attr("data-list-month");
  listmonth = JSON.parse(listmonth);
  let listmoney = $("#container-day").attr("data-list-money-m");
  listmoney = JSON.parse(listmoney);
  let listorder = $("#container-day").attr("data-list-order-m");
  listorder = JSON.parse(listorder);
  const ctx = document.getElementById('myChart1').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: listmonth,
          datasets: [{
            label: 'Tổng tiền',
            data: listmoney,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          },
          {
            type: 'line',
            label: 'Tổng số đơn',
            data: listorder,
            fill: false,
            borderColor: 'rgb(80,199,199)',
        }],
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
})


$(function () {
  let listyear = $("#container-day").attr("data-list-year");
  listyear = JSON.parse(listyear);
  let listmoney = $("#container-day").attr("data-list-money-y");
  listmoney = JSON.parse(listmoney);
  const ctx = document.getElementById('myChart2').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: listyear,
          datasets: [{
            label: 'Tổng tiền',
            data: listmoney,
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(145, 44, 238)',

            ],
            hoverOffset: 2,
          }
        ],
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
})

$(function () {
  let listyear = $("#container-day").attr("data-list-year");
  listyear = JSON.parse(listyear);
  let listorder = $("#container-day").attr("data-list-order-y");
  listorder = JSON.parse(listorder);
  const ctx = document.getElementById('myChart3').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: listyear,
          datasets: [{
            label: 'Tổng tiền',
            data: listorder,
            backgroundColor: [
              'rgb(244, 164, 96)',
              'rgb(135, 206, 235)',
              'rgb(173, 255, 47)',
              'rgb(0, 128, 128)'

            ],
            hoverOffset: 2,
          }
        ],
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
})

// lgtm [js/unused-local-variable]
