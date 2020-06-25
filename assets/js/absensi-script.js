const jam = document.querySelector('#jam');

setInterval(() => {
  const Dates = new Date();
  const jam_sekarang = Dates.getHours() < 10 ? '0' + Dates.getHours() : Dates.getHours();
  const menit_sekarang = Dates.getMinutes() < 10 ? '0' + Dates.getMinutes() : Dates.getMinutes();
  const detik_sekarang = Dates.getSeconds() < 10 ? '0' + Dates.getSeconds() : Dates.getSeconds();
  jam.innerHTML = jam_sekarang + ':' + menit_sekarang + ' WIB';
}, 1000)

// const tombolAbsen = document.querySelectorAll('.tombol-absen')
// tombolAbsen.forEach(function (tblAbsen) {
//   tblAbsen.addEventListener('click', function () {
//     document.querySelector('#modal-absen #nama').value = this.dataset.nama;
//     document.querySelector('#modal-absen #nis').value = this.dataset.nis;
//   })
// })

const absenSiswa = document.querySelectorAll('.absen-siswa')
absenSiswa.forEach(function (a) {
  a.addEventListener('keyup', () => {
    if (a.value.length == 1) {
      if (event.which == 65 || event.which == 73 || event.which == 83) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.status == 200 && xhr.readyState == 4) {
            console.log(this.responseText)
          }
        }

        xhr.open('POST', 'http://localhost/absensi/Guru/absen_siswa', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        xhr.send('keterangan=' + a.value + '&id_jadwal_pelajaran_detail=' + a.dataset.id + '&nis=' + a.dataset.nis)
      }
    }
  })
})

const editAbsen = document.querySelectorAll('.input-edit-absen')
editAbsen.forEach(function (a) {
  a.addEventListener('keyup', () => {
    if (a.value.length == 1) {
      if (event.which == 65 || event.which == 73 || event.which == 83) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.status == 200 && xhr.readyState == 4) {
            console.log(this.responseText)
          }
        }

        xhr.open('POST', 'http://localhost/absensi/Guru/edit_absen', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        xhr.send('keterangan=' + a.value + '&tanggal=' + a.dataset.tanggal + '&nis=' + a.dataset.nis)
      }
    }
  })
})
