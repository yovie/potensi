# Potensi

	select * from pertanyaan where jenis='pertanyaan' and id not in (select pertanyaan_id from tes_jawaban where tes_id=2);
