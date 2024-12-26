import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Link, Head } from '@inertiajs/react';

export default function Index({ auth, products }) {
    return (
        <AuthenticatedLayout>
            <Head title="Products" />
            <div className="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
                <h1 className="text-3xl font-bold mb-6 text-center font-serif">Flower for your love</h1>
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                    {products.map((product) => (
                        <div key={product.id} className="border border-gray-300  shadow-lg hover:shadow-xl transition-shadow duration-300 p-4 bg-gradient-to-r from-pink-100 to-white hover:bg-gradient-to-r hover:from-pink-200 hover:to-white transform hover:scale-105">
                        <img
                            src={product.image}
                            alt={product.name}
                            className="w-full h-56 object-cover rounded-lg transition-transform duration-300 transform hover:scale-105"
                        />
                        <h2 className="mt-4 text-xl font-semibold text-center text-gray-800 transition-colors duration-300">{product.name}</h2>
                        <p className="text-green-600 mt-2 text-center text-lg font-medium">฿{product.price}</p>
                        <Link
                            href={`/products/${product.id}`}
                            className="mt-4 inline-block text-red-500 hover:text-red-700 text-sm font-medium transition-colors duration-300"
                        >
                            See more
                        </Link>
                    </div>
                    
                    ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
