<script>
    const saveToLocal = (id) => {
        if (!checkSupportLocalStorage()) {
            return
        }
        const element = $('#' + id)
        const key = element.attr('id')
        const value = element.hasClass('bg-success') ? 1 : 0
        let uni = JSON.parse(localStorage.getItem(TV_KEY))
        if (Object.keys(uni.data).length === 0) {
            uni.data[key] = value
        } else {
            if (uni.data[key] === undefined) {
                uni.data[key] = value
            } else {
                delete uni.data[key]
            }
        }
        localStorage.setItem(TV_KEY, JSON.stringify(uni))
    }

    const onClickTV = (id) => {
        if (id !== undefined) {
            const element = $('#' + id)
            if (element.hasClass('bg-success')) {
                element.removeClass('bg-success')
            } else {
                element.addClass('bg-success')
            }
            saveToLocal(id)
        }
        return
    }

    const saveTandaVital = async () => {
        const data = await getTvStorage()
        const body = {
            data: JSON.stringify(data),
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
        }
        const response = await fetch('{{ route("perawat.icu.intruks-harian.save-tanda-vital") }}',{
            method: 'POST',
            body: JSON.stringify(body),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        const result = await response.json()
        if (result.status === 'success') {
            localStorage.removeItem(TV_KEY)
            await Swal.fire({
                title: 'Berhasil',
                text: result.message,
                icon: 'success',
                confirmButtonText: 'OK'
            })
            location.reload()
        } else {
            await Swal.fire({
                title: 'Gagal',
                text: result.message,
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }
    }

    const saveGkp = async () => {
        const data = await getGkpStorage()
        const gkp = {
            gcs: data.gcs,
            kesadaran: data.kesadaran,
            pupil: data.pupil,
        }
        const body = {
            data: JSON.stringify(gkp),
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
        }
        const response = await fetch('{{ route("perawat.icu.intruks-harian.save-gkp") }}',{
            method: 'POST',
            body: JSON.stringify(body),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        const result = await response.json()
        if (result.status === 'success') {
            localStorage.removeItem(GKP_KEY)
            await Swal.fire({
                title: 'Berhasil',
                text: result.message,
                icon: 'success',
                confirmButtonText: 'OK'
            })
            location.reload()
        } else {
            await Swal.fire({
                title: 'Gagal',
                text: result.message,
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }
    }

    const gcsChange = (element) => {
        const id = element.id
        const value = element.value
        const gkp = getGkpStorage()
        const data = gkp.gcs
        if (value === "") {
            delete data[id]
        } else {
            data[id] = value
        }
        localStorage.setItem(GKP_KEY, JSON.stringify({
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
            gcs: data,
            kesadaran: gkp.kesadaran,
            pupil: gkp.pupil
        }))
    }

    const kesadaranChange = (element) => {
        const id = element.id
        const value = element.value
        const gkp = getGkpStorage()
        const data = gkp.kesadaran
        if (value === "") {
            delete data[id]
        } else {
            data[id] = value
        }
        localStorage.setItem(GKP_KEY, JSON.stringify({
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
            gcs: gkp.gcs,
            kesadaran: data,
            pupil: gkp.pupil
        }))
    }

    const pupilKaKiChange = (element) => {
        const id = element.id
        const value = element.value
        const gkp = getGkpStorage()
        const data = gkp.pupil
        if (value === "") {
            delete data[id]
        } else {
            data[id] = value
        }
        localStorage.setItem(GKP_KEY, JSON.stringify({
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
            gcs: gkp.gcs,
            kesadaran: gkp.kesadaran,
            pupil: data
        }))
    }

    $(document).ready(function () {
        $('body').on('click', '.custom-border', function () {
            if($(this)[0].nodeName === 'INPUT') {
                return
            }
            onClickTV($(this).attr('id'))
        })
    })
</script>
