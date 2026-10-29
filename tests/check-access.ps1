$ErrorActionPreference = 'Stop'
$phpPath = if ($env:PHP_BIN) { $env:PHP_BIN } else { 'C:\xampp\php\php.exe' }
$probe = Join-Path $PSScriptRoot 'access_probe.php'
$cases = @(
    @('guest', 'usuario', 'gestion', '31', 302),
    @('legacy', 'usuario', 'gestion', '31', 302),
    @('admin', 'usuario', 'gestion', '31', 200),
    @('jugador', 'usuario', 'gestion', '31', 403),
    @('profesor', 'categoria', 'save', '31', 403),
    @('guest', 'categoria', 'eliminar', '31', 302),
    @('admin', 'categoria', 'gestion', '31', 200),
    @('responsable', 'responsable', 'dashboard', '31', 200),
    @('profesor', 'profesor', 'dashboard', '31', 200),
    @('jugador', 'profesor', 'dashboard', '31', 403),
    @('jugador', 'usuario', 'editar', '31', 200),
    @('jugador', 'usuario', 'editar', '32', 403),
    @('admin', 'usuario', 'editar', '32', 200),
    @('admin', 'usuario', 'editar', '1 OR 1=1', 403),
    @('jugador', 'usuario', 'actualizar', '31', 200),
    @('jugador', 'usuario', 'actualizar', '32', 403),
    @('jugador', 'usuario', 'eliminar', '31', 403),
    @('guest', 'usuario', 'crearNuevo', '31', 302),
    @('admin', 'usuario', 'updatePassword', '32', 403)
)
foreach ($case in $cases) {
    $result = & $phpPath -n $probe $case[0] $case[1] $case[2] $case[3]
    if ($LASTEXITCODE -ne 0 -or $result -notmatch "STATUS=$($case[4])$") {
        throw "Falló la prueba $($case[0]) $($case[1])/$($case[2]): $result"
    }
    if ($case[0] -eq 'jugador' -and $case[2] -eq 'actualizar' -and $case[4] -eq 200 -and $result -notmatch 'ROLE=jugador') {
        throw 'La edición del perfil permitió modificar el rol.'
    }
}
Write-Output "Pruebas de permisos aprobadas: $($cases.Count). Sin cambios en la base de datos."
