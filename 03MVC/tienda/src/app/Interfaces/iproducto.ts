enum GrabaIVA {
    SI = "SI",
    NO = "NO",
}

export interface Producto {
    idProducto: number;
    codigoBarras: string;
    nombreProducto: string;
    grabaIVA: GrabaIVA;
}
