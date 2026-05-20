import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { ContactBlock } from '../components/ContactBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockUrls } from '../data/mockData';

interface InvoiceEmailProps extends CommonEmailProps {
  invoiceUrl?: string;
}

export const InvoiceEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  invoiceUrl = mockUrls.invoiceUrl,
}: InvoiceEmailProps) => {
  const previewText = 'Te enviamos tu factura.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Te adjuntamos la factura correspondiente a tu viaje.
          </Paragraph>
          <Paragraph>
            Hemos dejado el documento listo para que puedas descargarlo fácilmente mediante el siguiente botón y mantenerlo en tus archivos.
          </Paragraph>

          <CTAButton href={invoiceUrl}>
            Descargar Factura
          </CTAButton>
          
          <ContactBlock supportEmail={supportEmail} />

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default InvoiceEmail;
