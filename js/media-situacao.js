function calculateMediaAndSituacao() {
    const primeira = parseFloat(document.getElementById('primeira').value) || 0;
    const segunda = parseFloat(document.getElementById('segunda').value) || 0;
    const media = (primeira + segunda) / 2;
    let situacao = "";
    
    if (media >= 7) {
        situacao = 'Aprovado';
    } else if (media >= 5) {
        situacao = 'Recuperação';
    } else {
        situacao = 'Reprovado';
    }
    // Update the media and situacao fields
    document.getElementById('media').value = media.toFixed(2);
    document.getElementById('situacao').value = situacao;
}

// Attach the calculateMediaAndSituacao function to input events
document.getElementById('primeira').addEventListener('input', calculateMediaAndSituacao);
document.getElementById('segunda').addEventListener('input', calculateMediaAndSituacao);

// Calculate and update media and situacao on page load
calculateMediaAndSituacao();

